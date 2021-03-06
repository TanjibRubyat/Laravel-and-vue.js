<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required',
            'slug' => 'required'
        ]);
       

    
        try{ 
            $galleries = [];

            foreach($request->file('gallery') as $gFile){
                $gImageName = time().'.'.$gFile->extension();
                $path = $gFile->storeAs(
                    'public/galleries', $gImageName
                ); 
                array_push($galleries, $gImageName);
            };




            $imageName = null;
            if($request->hasFile('image'))
            {
                $images = $request->file('image');
                $imageName = time().'.'.$images->extension();
                $path = $request->file('image')->storeAs(
                    'public/images', $imageName
                ); 
            }
            

             Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'slug' => $request->slug,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imageName,
            'gallery' => $galleries,
            ]);
            return redirect()->back()->with('success',"Upload successful");
        }catch(\Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. please try again.');
        }
        
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories= Category::all();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        try{

            $galleries = [];

            foreach($request->file('gallery') as $gFile){
                $gImageName = time().'.'.$gFile->extension();
                $path = $gFile->storeAs(
                    'public/galleries', $gImageName
                ); 
                array_push($galleries, $gImageName);
            };

            
            $imageName = null;
            if($request->hasFile('image'))
            {
                $images = $request->file('image');
                $imageName = time().'.'.$images->extension();
                $path = $request->file('image')->storeAs(
                    'public/images', $imageName
                ); 
            }

            $product = Product::find($id);
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->quantity = $request->quantity;
            if($imageName !== null){
                Storage::delete('public/images/'.$product->image);

                $product->image  = $imageName;
            }
            
            if(!empty($galleries))
            {
                foreach($product->gallery as $gFile){
                        Storage::delete('public/galleries/'.$gFile);
                }
                $product->gallery = $galleries;

            }
            $product->update();
            return redirect()->back()->with('success','Updated successfully');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
}
