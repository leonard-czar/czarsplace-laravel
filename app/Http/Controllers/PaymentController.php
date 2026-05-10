<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Exceptions\PaymentVerificationFailedException;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function redirectToGateway(Request $request): RedirectResponse
    {
        $request->validate([
            'address' => 'required|string',
        ]);

        $cartItems = Cart::where('user_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return Redirect::back()->with(['msg' => 'Your cart is empty.', 'type' => 'error']);
        }

        $mail = auth()->user()->email;

        try {
            $order = DB::transaction(function () use ($request, $cartItems) {
                $total = $cartItems->sum(fn ($row) => (float) $row->total);

                $order = Orders::create([
                    'user_id' => auth()->id(),
                    'alt_telephone' => $request->input('altphone'),
                    'shipping_address' => $request->input('address'),
                    'total_amount' => (string) $total,
                ]);

                foreach ($cartItems as $item) {
                    OrderDetails::create([
                        'order_id' => $order->id,
                        'unit_price' => $item->price,
                        'qty' => $item->qty,
                        'product_id' => $item->product_id,
                        'total' => (string) ((float) $item->qty * (float) $item->price),
                    ]);
                }

                return $order;
            });

            $total = (float) $order->total_amount;

            $data = [
                'amount' => (int) round($total * 100),
                'reference' => (string) $order->id,
                'email' => $mail,
                'currency' => 'NGN',
            ];

            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Throwable $e) {
            report($e);

            return Redirect::back()->with(['msg' => 'Unable to start payment. Please try again.', 'type' => 'error']);
        }
    }

    /**
     * Paystack redirects here after payment. Must work without an authenticated session.
     */
    public function handleGatewayCallback(): RedirectResponse
    {
        try {
            $paymentDetails = Paystack::getPaymentData();
        } catch (PaymentVerificationFailedException $e) {
            return redirect()
                ->route('login')
                ->with('error', 'We could not verify this payment. If you were charged, contact support with your Paystack reference.');
        }

        $payload = $paymentDetails['data'] ?? [];
        $reference = $payload['reference'] ?? null;
        $status = $payload['status'] ?? null;
        $amountKobo = isset($payload['amount']) ? (int) $payload['amount'] : null;

        if ($reference === null || $reference === '') {
            return redirect()->route('login')->with('error', 'Invalid payment response.');
        }

        $orderId = (int) $reference;
        $order = Orders::find($orderId);

        if (! $order) {
            return redirect()->route('login')->with('error', 'Order not found. Contact support if you completed a payment.');
        }

        $expectedKobo = (int) round((float) $order->total_amount * 100);
        if ($amountKobo !== null && abs($amountKobo - $expectedKobo) > 1) {
            report(new \RuntimeException("Paystack amount mismatch for order {$orderId}: expected {$expectedKobo}, got {$amountKobo}"));

            return redirect()->route('login')->with('error', 'Payment verification failed (amount mismatch). Contact support.');
        }

        if ($status === 'success') {
            Payment::updateOrCreate(
                ['order_id' => $orderId],
                [
                    'payment_status' => 'complete',
                    'amount' => (string) ($amountKobo ?? $expectedKobo),
                ]
            );

            Cart::where('user_id', $order->user_id)->delete();

            if (auth()->check() && (int) auth()->id() === (int) $order->user_id) {
                return redirect()
                    ->route('userorder')
                    ->with('success', 'Payment completed successfully.');
            }

            return redirect()
                ->route('login')
                ->with('success', 'Payment completed. Log in to view your orders.');
        }

        Payment::updateOrCreate(
            ['order_id' => $orderId],
            [
                'payment_status' => 'pending',
                'amount' => (string) ($amountKobo ?? 0),
            ]
        );

        if (auth()->check()) {
            return redirect()
                ->route('showcart')
                ->with(['msg' => 'Payment was not completed.', 'type' => 'error']);
        }

        return redirect()
            ->route('login')
            ->with('error', 'Payment was not completed. You can try again from your cart after logging in.');
    }
}
