<?php

namespace App\Http\Resources\Frontend\product;

use Illuminate\Http\Resources\Json\Resource;

class ProductDetailsResource extends Resource
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
            'materials'=>$this->main_materials,
            'model'=>$this->product_model,
            'pieces'=>$this->num_of_pieces,
            'color_shade'=>$this->color_shade,
            'extra_details'=>$this->extra_details,
            'warranty_policy'=>$this->warranty_policy,
            'warranty_period'=>$this->warranty_period,
        ];
    }
}
