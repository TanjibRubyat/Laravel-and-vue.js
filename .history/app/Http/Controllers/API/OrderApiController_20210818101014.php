<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function saveOrder(Request $request)
    {
        dd($request->all());
    }
}
