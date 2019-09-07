<?php

namespace App\Http\Resources\Frontend\product;

use Illuminate\Http\Resources\Json\Resource;

class ProductVariationResource extends Resource
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
            'sellerSku'=>$this->seller_sku,
            'priId'=>$this->pri_id,
            'priModel'=>$this->pri_model,
            'secId'=>$this->sec_id,
            'secModel'=>$this->sec_model,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'specialPrice'=>$this->special_price,
            'gift_id'=>$this->gift_product_id,
            'gift_sku'=>$this->gift_product_sku,
            'primaryModel'=> $this->primaryModel,
            'secondaryModel'=>$this->secondaryModel
        ];
    }
}
