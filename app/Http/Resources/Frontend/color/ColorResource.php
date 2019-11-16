<?php

namespace App\Http\Resources\Frontend\color;

use App\Http\Resources\product\ProductCollection;
use Illuminate\Http\Resources\Json\Resource;

class ColorResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->color_id,
            'name'=>$this->color_name,
            'code'=>$this->color_code,
            'status'=>$this->color_status,
            'products'=> ProductCollection::collection($this->whenLoaded('product')),
            'links'=>[
                'products_link'=>url('color/'.$this->category_id.'/products')
            ]
        ];
    }
}
