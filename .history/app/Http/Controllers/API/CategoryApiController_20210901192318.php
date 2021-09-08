<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\backend\category\CategoryController;

class CategoryApiController extends Controller
{
    public function index(){
        return response()->json([
            'success'=>true,
            'data'=>CategoryController::$request->all(),
            'message'=>'',
            'errors'=>[]
        ]);
    }
}
