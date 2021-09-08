<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    $orders = Orders::all();
    return view('admin.orders.index');
}
