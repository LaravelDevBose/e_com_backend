<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
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
            'occasion'=>$this->product_occasion,
            'color_shade'=>$this->color_shade,
            'skin_type'=>$this->skin_type,
            'extra_details'=>$this->extra_details,
            'warranty_policy'=>$this->warranty_policy,
            'warranty_policy_eng'=>$this->warranty_policy_eng,
            'warranty_period'=>$this->warranty_period,
            'cod_avail'=> $this->cod_avail,
        ];
    }
}
