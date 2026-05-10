<?php

namespace App\Http\Controllers;

use App\Models\Orders;

class OrdersController extends Controller
{
    public function userOrder()
    {
        $orders = Orders::where('user_id', auth()->id())
            ->with(['payment', 'orderdetails.products'])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('userorder', [
            'orders' => $orders,
        ]);
    }

    public function displayOrders()
    {
        $order = Orders::with(['payment', 'user'])->latest()->paginate(25);

        return view('allorders', [
            'orders' => $order,
        ]);
    }
}
