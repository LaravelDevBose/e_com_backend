<?php

namespace App\Http\Resources\Frontend\product;

use App\Http\Resources\Frontend\color\ColorResource;
use App\Http\Resources\Frontend\size\SizeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariationResource extends JsonResource
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
            'id'=>$this->variation_id,
            'colorId'=> $this->color_id,
            'sizeId'=> $this->size_id,
            'sellerSku'=>$this->seller_sku,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'color'=> new ColorResource($this->color),
            'size'=> new SizeResource($this->size)
        ];
    }
}
