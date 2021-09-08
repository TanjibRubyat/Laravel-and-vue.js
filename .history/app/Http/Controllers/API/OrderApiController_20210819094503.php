<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;

class OrderApiController extends Controller
{
    public function saveOrder(Request $request)
    {
        try {
            Orders::create([
                'customer_id' => $request->customer_id,
                'discount' => $request->discount,
                'subtotal' => $request->sub_total,
                'grandtotal' => $request->grand_total,
                'shipping_address' => $request->shipping_address
            ]);
            return redirect()->back()->with('success', "Upload successful");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. please try again.');
        }
    }
}
