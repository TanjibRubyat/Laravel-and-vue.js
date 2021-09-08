<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

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

        }

    }
}
