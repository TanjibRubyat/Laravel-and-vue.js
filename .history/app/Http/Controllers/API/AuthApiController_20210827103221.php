<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Validator;

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
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255'
        ]);
        
        if ($validator->fails()) {
            return view('view_name');
        }

        $user=User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
        ]);
        return response()->json([
            'success'=>true,
            'data'=>$user,
            'message'=>'Register successful',
            'errors'=>[]
        ]);
    }
}