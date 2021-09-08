<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.index',compact('payments'));
    }

    public function create()
    {
        return view('admin.payment.create');
    }

    public function store(Request $request)
    {
        try{
            Payment::create([
                'name' => $request->name
            ]);

            return redirect()->back()->with('success','Created successfully');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. please try again.');
        }

    }
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('admin.payment.edit',compact('payment'));
    }

    public function update(Request $request, $id)
    {
        
        try{
            $product = Payment::find($id);
            $product->name = $request->name;            
            $product->update();
            return redirect()->back()->with('success','Updated successfully');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
