<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['total_order'] = DB::table('orders')->count();
        $data['order_today'] = DB::table('orders')->whereDate('created_at', Carbon::today())->count();
        $data['max_order_product'] = DB::table('order_items')
        ->selectRaw('products.name , product_id, sum(order_items.quantity) as totalQty')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->groupBy('product_id')
        ->orderByDesc('totalQty')
        ->first();
        dd($data['max_order_product.name']);
        // SELECT product_id, products.name,  sum(order_items.quantity) as total_order FROM `order_items` 
        //join products on products.id = order_items.product_id group by product_id order by total_order desc limit 1;

        return view('admin.dashboard.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
