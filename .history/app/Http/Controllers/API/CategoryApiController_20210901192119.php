<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index(){
        return response()->json([
            'success'=>true,
            'data'=>CategoryController::all(),
            'message'=>'',
            'errors'=>[]
        ]);
    }
}
