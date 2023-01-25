<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    //

    public function insertCart(Request $request){
        $request->validate([
            'qty'=>['required', 'gte:1'],
         ],[
                'qty.required'=>'please enter a valid quantity',
                'qty.min_digits'=>'quantity cannot be less than 1'
                
                
            ],[
                'qty'=>'quantity'
                       
        ]);
        if (Cart::where('product_id', '=', $request->input('watchid'))->exists()) {
            
            return back()->with('error','Item already in cart!');
         }else {
            $cart= new Cart();
            $userid = Auth::id();
            $newqty=$request->input('qty');
            $newprice=$request->input('price');
            $cart->qty=$request->input('qty');
            $cart->price=$request->input('price');
            $cart->total=$newqty*$newprice;
            $cart->user_id=$userid;
            $cart->product_id=$request->input('watchid');
            $cart->save();
            return back()->with('success',"Item added to cart successfully!
             Click on the cart icon to view cart item(s)");
         }

       
    }
    public function showUserCart(){
        $carts=Cart::where('user_id',auth()->id())->get();
        return view('cart')->with('carts',$carts);
    }
    public function cartCount(){
        

    }
    public function deleteCart(){
        Cart::where('user_id', auth()->id())->delete();
        return back();        
    }

    public function deleteCartItem($id){
        $cart = Cart::find($id);
        if($cart){
            $cart->delete();
            return back();
        }
        else{
            
        }
    }
    


}
