<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryCost extends JsonResource
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
            'id'=>$this->cost_id,
            'title'=>$this->cost_title,
            'area'=>\App\Models\DeliveryCost::DeliveryArea[$this->delivery_area],
            'weight'=>$this->package_weight,
            'length'=>$this->package_length,
            'width'=>$this->package_width,
            'height'=>$this->package_height,
            'price'=>$this->cost_price,
            'status'=>$this->cost_status,
        ];
    }
}
