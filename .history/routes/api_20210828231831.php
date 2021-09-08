<?php

use App\Http\Controllers\API\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OrderApiController;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\PaymentApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/products', [ProductApiController::class,'getProducts']);
Route::get('/product-by-slug/{slug}', [ProductApiController::class,'getProductBySLug']);
Route::post('/place-order', [OrderApiController::class,'saveOrder']);
Route::get('/payment-methods', [PaymentApiController::class,'paymentMethods']);


Route::post('/user-register',[AuthApiController::class,'register']);
Route::post('/user-login',[AuthApiController::class,'login']);
Route::middleware(['auth:api'])->get('/user-details',[AuthApiController::class,'userDetails']);
Route::get('/user-login',[AuthApiController::class,'login']);