<?php

namespace App\Http\Controllers\backend\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create',compact('categories'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|max:255',
        ]);
        try{
            Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->back()->with('success','Category created successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

    public function index()
    {
        $category = Category::all();
        return view('admin.category.index')->with('categories', $category);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.category.edit', compact('category','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        try{
            $category = Category::find($id);
            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->update();

        return redirect()->back()->with('success','Category updated successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        
    }
}
