<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderitem;
use \PDF;
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
        $items = OrderItem::where('order_id',$id)->get();
        return view('admin.orders.show',compact('orderDetails','items'));
    }    

    public function changeStatus(Request $request,$id)
    {
        try{
            $status = Order::find($id);
            $status->order_status = $request->order_status;
            $status->update();
            return redirect()->back()->with('success','Updated successfully');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function invoice($id){
        Mail::to($request->customer_info['email'])->send(new OrderInvoice());
        $orderDetails = Order::find($id);
        $items = OrderItem::where('order_id',$id)->get();
        $pdf = PDF::loadView('admin.orders.pdf.invoice', ['orderDetails' => $orderDetails, 'items'=>$items]);
        return $pdf->stream('invoice.pdf');
        return view('admin.orders.pdf.invoice', compact('orderDetails','items'));
    }
}
