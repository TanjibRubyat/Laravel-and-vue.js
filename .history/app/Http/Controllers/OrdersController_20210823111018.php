<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index')->with('orders',$orders);
    }

   
        public function show($id)
    {
        $orderDetails = Order::find($id);
        return view('admin.orders.show',compact('orderDetails'));
    }
    
}
