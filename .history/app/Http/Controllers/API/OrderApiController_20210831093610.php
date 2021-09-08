<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\OrderInvoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderApiController extends Controller
{
    public function saveOrder(Request $request)
    {
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
                'sub_total' => $request->sub_total,
                'grand_total' => $request->grand_total,
                'shipping_address' => $request->shipping_address,
                'payment_method'=> $request->payment_method,
                'order_status'=>'in_progress'
            ]);

            foreach ($request->items as $orderItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $orderItem['product_id'],
                    'product_price' => $orderItem['price'],
                    'quantity' => $orderItem['buyQty']
                ]);
            }
            // Mail::to($request->customer_info['email'])->send(new OrderInvoice());
            $email = $request->customer_info['email'];

            Mail::send('emails.orders.invoice', $email, function($message) use ($email,$pdf){
                $message->from('info@eshop.com');
                $message->to($email);
                $message->subject('Thank you message');
                //Attach PDF doc
                $message->attachData($pdf->output(),'customer.pdf');
            });

            return response()->json([
                'success' => true,
                'data' => ['order_id' => $order->id],
                'message' => 'Order placed successfully',
                'errors' => []
            ]);
        } catch (\Exception $e) {
            Log::error('Order Place: '.$e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Opps! Please try again!',
                'errors' => []
            ]);
        }
    }
}
