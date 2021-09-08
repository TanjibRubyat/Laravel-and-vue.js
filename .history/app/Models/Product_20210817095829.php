<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    // protected $table = "mytable";
    protected $fillable= [
    
        'name',
        'slug',
        'price',
        'category_id',
        'description',
        'quantity',
        'image',
        'gallery'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function setGalleryAttribute($galleries){
        $this->attributes['gallery'] = json_encode($galleries);
    }
    public function getGalleryAttribute($galleries){
       return json_decode($galleries);
    }
}
