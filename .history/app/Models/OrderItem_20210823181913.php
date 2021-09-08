<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded=[];

    public static function index($order_id)
    {
        $data = Order::where('id',OrderItem::find($order_id))->get();
        return $data;
    }
}
