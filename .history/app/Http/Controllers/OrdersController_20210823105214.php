<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    $orders = Orders::all();
    return view('admin.orders.index');
}
