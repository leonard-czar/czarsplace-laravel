<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Payment;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    //

    public function redirectToGateway(Request $request)
    {
        try {
            $request->validate([
                'address' => 'required|string'
            ]);

            $cartItem = Cart::where('user_id', auth()->id())->get();
            if (!empty($cartItem)) {

                $order = new Orders();
                $order->id = $randomnumber = random_int(10000000000, 99999999999);
                $order->user_id = auth()->id();
                $order->alt_telephone = $request->input('altphone');
                $order->shipping_address = $request->input('address');
                $order->total_amount = $total = Cart::where('user_id', auth()->id())->sum('total');
                $mail = auth()->user()->email;
                $order->save();

                foreach ($cartItem as $item) {
                    $orderdetails = new OrderDetails();
                    $orderdetails->order_id = $randomnumber;
                    $orderdetails->unit_price = $item->price;
                    $orderdetails->qty = $item->qty;
                    $orderdetails->product_id = $item->product_id;
                    $orderdetails->total = $item->qty * $item->price;
                    $orderdetails->save();
                }

                $data = array(
                    "amount" => $total * 100,
                    "reference" => $randomnumber,
                    "email" => $mail,
                    "currency" => "NGN",
                );
                return Paystack::getAuthorizationUrl($data)->redirectNow();
            }
        } catch (\Exception $e) {
            return Redirect::back()->with(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {

        $paymentDetails = Paystack::getPaymentData(); //this comes with all the data needed to process the transaction
        // Getting the value via an array method
        $orderid = $paymentDetails['data']['reference']; // Getting InvoiceId I passed from the form
        $status = $paymentDetails['data']['status']; // Getting the status of the transaction
        $amount = $paymentDetails['data']['amount']; //Getting the Amount


        if ($status == "success") { //Checking to Ensure the transaction was succesful
            $paymentstatus = 'complete';
            Payment::create(['order_id' => $orderid, 'payment_status' => $paymentstatus, 'amount' => $amount]); // Storing the payment in the database
            Cart::where('user_id', auth()->id())->delete();
            return redirect()->route('userorder');
        } else {
            $paymentstatus = 'pending';
            Payment::create(['order_id' => $orderid, 'payment_status' => $paymentstatus, 'amount' => $amount]); // Storing the payment in the database         
            return redirect()->route('showcart');
        }

        // Now you have the payment details,
        // you can store the authorization_code in your DB to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
