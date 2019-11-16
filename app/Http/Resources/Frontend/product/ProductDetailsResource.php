<?php

namespace App\Http\Resources\Frontend\product;

use App\Http\Resources\Frontend\skinType\SkinTypeResource;
use App\Models\ProductDetails;
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
            'productModel'=>$this->product_model,
            'pieces'=>$this->num_of_pieces,
            'occasion'=>$this->product_occasion,
            'colorShade'=>$this->color_shade,
            'skinType'=> new SkinTypeResource($this->skinType),
            'extraDetails'=>$this->extra_details,
            'warrantyPolicy'=>$this->warranty_policy,
            'warrantyPolicyEn'=>$this->warranty_policy_eng,
            'warrantyPeriod'=>$this->warranty_period.' '.($this->warranty_period > 1)? ProductDetails::PeriodUnitM : ProductDetails::PeriodUnitS,
        ];
    }
}
