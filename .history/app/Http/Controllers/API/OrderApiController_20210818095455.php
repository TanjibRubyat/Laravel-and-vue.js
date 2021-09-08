<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function placeOrder(Request $request)
    {
        dd($request->all());
    }
}
