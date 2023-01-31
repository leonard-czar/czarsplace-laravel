<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function adminDashboard()
    {
        $product = Product::all();
        $brand = Brand::all();
        $order = Orders::all();
        $payment = Payment::all();
        $user = User::all();
        $username = Auth::user()->name;

        return view('admindashboard', [
            'products' => $product,
            'brands' => $brand,
            'orders' => $order,
            'payments' => $payment,
            'users' => $user,
            'username' => $username
        ]);
    }
    public function displayUsers()
    {
        $username = User::where('role', '0')->get();
        return view('allusers', [
            'users' => $username
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
