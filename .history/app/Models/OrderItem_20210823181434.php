<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded=[];

    public static function index()
    {
        $data = Order::where('id',OrderItem->order_id)->get();
    }
}
