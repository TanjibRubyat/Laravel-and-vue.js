<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderitem;

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
        $items = OrderItem::find($id);
        return view('admin.orders.show',compact('orderDetails','items'));
    }    
}
