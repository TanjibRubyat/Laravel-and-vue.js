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

    public function create(Request $request)
    {
        try{
            Payment::create([
                'name' => $request->name;
            ]);
        }
    }
}
