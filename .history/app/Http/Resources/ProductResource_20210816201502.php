<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $newGalleries = [];
        foreach($this->gallery as $gImage){
            $newGalleries[] = asset('/storage/galleries/'.$gImage);
        }

        return [
            
            'name' => $this->name,
            'price' => $this->price,
            'slug' => $this->slug,
            'image' => asset('/storage/images/'.$this->image),
            'gallery' => $newGalleries
        ];

    }
    
}
