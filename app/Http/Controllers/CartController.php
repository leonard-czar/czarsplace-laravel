<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function insertCart(Request $request)
    {
        $request->validate([
            'qty' => ['required', 'integer', 'gte:1'],
            'watchid' => ['required', 'integer', 'exists:products,id'],
        ], [
            'qty.required' => 'please enter a valid quantity',
            'qty.gte' => 'quantity cannot be less than 1',
            'watchid.required' => 'please choose a product',
            'watchid.exists' => 'that product is not available',
        ], [
            'qty' => 'quantity',
            'watchid' => 'product',
        ]);

        $userId = Auth::id();
        $productId = (int) $request->input('watchid');

        if (Cart::where('user_id', $userId)->where('product_id', $productId)->exists()) {
            return back()->with('error', 'Item already in cart!');
        }

        $product = Product::query()->findOrFail($productId);
        $unitPrice = (float) $product->watch_price;
        $qty = (int) $request->input('qty');

        $cart = new Cart;
        $cart->qty = (string) $qty;
        $cart->price = (string) $unitPrice;
        $cart->total = (string) ($qty * $unitPrice);
        $cart->user_id = $userId;
        $cart->product_id = $productId;
        $cart->save();

        return back()->with('success', 'Item added to cart successfully!
             Click on the cart icon to view cart item(s)');
    }

    public function showUserCart()
    {
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
        $total = $carts->sum('total');

        return view('cart', compact('carts', 'total'));
    }

    public function deleteCart()
    {
        Cart::where('user_id', Auth::id())->delete();

        return back();
    }

    public function deleteCartItem($id)
    {
        Cart::where('user_id', Auth::id())->whereKey($id)->delete();

        return back();
    }

    public function findCart($id)
    {
        $item = Cart::with('product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('editcart')->with('items', $item);
    }

    public function editCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'gte:1'],
        ], [], [
            'quantity' => 'quantity',
        ]);

        $cart = Cart::with('product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $qty = (int) $request->input('quantity');
        $unitPrice = $cart->product !== null
            ? (float) $cart->product->watch_price
            : (float) $cart->price;

        $cart->qty = (string) $qty;
        $cart->price = (string) $unitPrice;
        $cart->total = (string) ($qty * $unitPrice);
        $cart->save();

        return redirect()->route('showcart');
    }
}
