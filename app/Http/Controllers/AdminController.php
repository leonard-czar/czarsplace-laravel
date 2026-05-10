<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admindashboard', [
            'productCount' => Product::count(),
            'brandCount' => Brand::count(),
            'orderCount' => Orders::count(),
            'paymentCount' => Payment::count(),
            'userCount' => User::where('role', '0')->count(),
            'username' => Auth::user()->name,
        ]);
    }

    public function displayUsers()
    {
        $username = User::where('role', '0')->get();

        return view('allusers', [
            'users' => $username,
        ]);
    }
}
