<?php

namespace App\Http\Resources\product;

use App\Http\Resources\color\ColorResource;
use App\Http\Resources\size\SizeResource;
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
            'sellerSku'=>$this->seller_sku,
            'priId'=>$this->pri_id,
            'priModel'=>$this->pri_model,
            'secId'=>$this->sec_id,
            'secModel'=>$this->sec_model,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'primaryModel'=> new ColorResource($this->primaryModel),
            'secondaryModel'=> new SizeResource($this->secondaryModel)
        ];
    }
}
