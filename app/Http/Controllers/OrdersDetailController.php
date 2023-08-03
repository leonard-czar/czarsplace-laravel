<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrdersDetailController extends Controller
{
    //
    public function displayDetails($id)
    {       
        return view('orderdetails', [
            'orders' => OrderDetails::where('order_id', $id)->get()    
        ]);
       
    }
}
