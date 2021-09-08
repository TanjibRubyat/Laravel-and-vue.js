<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function userDetails(){
        
    }
    public function login(Request $request){
            
        $user = User::where('email',$request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success'=>false,
                'data'=>[],
                'message'=>'Login failed',
                'errors'=>[]
            ]);
        }else{
            return response()->json([
                'success'=>true,
                'data'=>['user'=> $user],
                'message'=>'Login success',
                'errors'=>[]
            ]);
           
        }
        
    }
    public function register(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'email'=>'required|max:255',
            'password'=>'required',

        ]);
        
        if ($validator->fails()) {
            return response()->json([
            'success'=>false,
            'data'=>"",
            'message'=>'Register failed',
            'errors'=>$validator->errors()
        ]);
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