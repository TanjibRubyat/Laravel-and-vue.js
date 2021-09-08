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

   
        public function edit($id)
    {
        $product = Product::find($id);
        $categories= Category::all();
        return view('admin.products.edit',compact('product','categories'));
    }
    
}
