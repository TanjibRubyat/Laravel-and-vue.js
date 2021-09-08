<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthApiController extends Controller
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
    public function register(Request $request){
        $user=User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
        ]);
    }
}