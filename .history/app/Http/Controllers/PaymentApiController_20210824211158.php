<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentApiController extends Controller
{
    public function paymentMethods()
    {
        return response()->json([
            'success' => true,
            'data' => Payment::all(),
            'message' => "",
            'errors' => []
        ]);

    }catch(\Exception $e){
        
    }
}
