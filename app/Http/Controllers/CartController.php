<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    //

    public function Insertcart(Request $request){
        $validated=$request->validate([
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
            $cart->customer_id=$userid;
            $cart->product_id=$request->input('watchid');
            $cart->save();
            return back()->with('success','Item added to cart successfully!');
         }

       
    }
    public function ShowuserCart(){
        $user=Auth::id();
        $carts=Cart::where('customer_id',$user)->get();
        return view('layouts.portal')->with('carts',$carts);
    }


}
