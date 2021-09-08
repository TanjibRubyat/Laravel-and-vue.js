<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    $orders = Order::all();
    return view('admin.orders.index');
}
