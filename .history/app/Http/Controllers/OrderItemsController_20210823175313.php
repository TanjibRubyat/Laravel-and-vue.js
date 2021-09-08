<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemsController extends Controller
{
    public function index($order_id){
        $orderItems = OrderItem::find($order_id);

    }
}
