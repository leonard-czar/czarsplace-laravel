<?php

namespace App\Http\Controllers;



use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class OrdersController extends Controller
{
    //

    public function userOrder()
    {
        $orders = Orders::where('user_id', auth()->id())->latest()->get();
        // dd($orders->load('payment'));
        return view('userorder', [
            'orders' => $orders
        ]);
    }

    public function displayOrders()
    {
        $order = Orders::all();
        return view('allorders', [
            'orders' => $order
        ]);
    }

   
}
