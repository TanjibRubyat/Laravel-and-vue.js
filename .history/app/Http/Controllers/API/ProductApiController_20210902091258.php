<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductApiController extends Controller
{
    public function getProducts(){
        try{
            return response()->json([
                'success' => true,
                'data' => new ProductCollection(Product::all()),
                'message' =>'',
                'errors' => []
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' =>'Please try again!',
                'errors' => []
            ]);
    }
}

public function getProductBySlug($slug)
{
    Product::where('slug',$slug)->first();

    try{
        return response()->json([
            'success' => true,
            'data' => new ProductResource(Product::where('slug',$slug)->first()),
            'message' =>'',
            'errors' => []
        ]);
    }catch(\Exception $e){
        return response()->json([
            'success' => false,
            'message' =>'Please try again!',
            'errors' => []
        ]);
}
}

public function getProductByCategoryId($categoryId)
{
    $products = Product::where('category_id',$categoryId)->get();

    try{
        return response()->json([
            'success' => true,
            'data' => new ProductResource(Product::where('slug',$slug)->first()),
            'message' =>'',
            'errors' => []
        ]);
    }catch(\Exception $e){
        return response()->json([
            'success' => false,
            'message' =>'Please try again!',
            'errors' => []
        ]);
}
}
}
