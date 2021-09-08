<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\category\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderItemsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/category-create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category-create',[CategoryController::class,'store'])->name('category.store');
Route::get('/category-index',[CategoryController::class,'index'])->name('category.index');
Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category-edit',[CategoryController::class,'update'])->name('category.update');

Route::get('/product-create',[ProductController::class,'create'])->name('product.create');
Route::post('/product-create',[ProductController::class,'store'])->name('product.store');
Route::get('/product-index',[ProductController::class,'index'])->name('product.index');
Route::get('/product-edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product-edit',[ProductController::class,'update'])->name('product.update');
Route::post('/product-destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');


Route::get('/order-index',[OrdersController::class,'index'])->name('order.index');
Route::get('/order-show/{id}',[OrdersController::class,'show'])->name('order.show');

Route::get('/order-item',[OrderItemsController::class,'index'])->name('order.item');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/{path}', function () {
    return view('home');
})->where('path','.*');