<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded=[];

    public static function index($id)
    {
        $data = Order::where('order_id',Order::find($id))->get();
    }
}
