<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginApiController extends Controller
{
    public function user(){
        try{
            return response()->json([
            'success'=>true,
            'data'=>User::all(),
            'message'=>'Login successful',
            'errors'=>[]
        ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Opps! Please try again!',
                'errors' => []
            ]);
        }
        
    }
}
