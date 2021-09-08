<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;

class OrderApiController extends Controller
{
    public function saveOrder(Request $request)
    {

        // array:5 [
        //     "items" => array:1 [
        //       0 => array:4 [
        //         "name" => "OPPO A71"
        //         "slug" => "oppo-a71"
        //         "buyQty" => 2
        //         "price" => 7000
        //       ]
        //     ]
        //     "shipping_address" => "dbdhfng"
        //     "customer_info" => array:6 [
        //       "first_name" => "efeffe"
        //       "last_name" => "esfsgeg"
        //       "email" => "sdvdsv@gmail.com"
        //       "address" => "dbdhfng"
        //       "zip_code" => "1205"
        //       "phone" => "5676856"
        //     ]
        //     "sub_total" => 14000
        //     "grand_total" => 14000
        //   ]

        try {
            $customer = Customer::create([
                'first_name' => $request->customer_info['first_name'],
                'last_name' => $request->customer_info['last_name'],
                'email' => $request->customer_info['email'],
                'address' => $request->customer_info['address'],
                'zip_code' => $request->customer_info['zip_code'],
                'phone' => $request->customer_info['phone'],
            ]);
            $order = Order::create([
                'customer_id' =>  $customer->id,
                'discount' => $request->discount,
                'subtotal' => $request->sub_total,
                'grandtotal' => $request->grand_total,
                'shipping_address' => $request->shipping_address
            ]);

            foreach($request->items as $orderItem){
                OrderItem::create([
                    'order_id' => $order -> id,
                    'product_id' => $orderItem->product_id,
                    'product_price' => $orderItem->price,
                    'quantity' => $orderItem->buyQty,
                ]);

            }
            return redirect()->back()->with('success', "Upload successful");
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. please try again.');
        }
    }
}
