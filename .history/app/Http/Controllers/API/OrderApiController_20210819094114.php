<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function saveOrder(Request $request)
    {
        Order::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'slug' => $request->slug,
            'price' => $request->price,
            ]);
            return redirect()->back()->with('success',"Upload successful");
        }catch(\Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. please try again.');
        }
    }
}
