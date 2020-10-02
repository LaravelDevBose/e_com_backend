<?php

namespace App\Http\Resources\deliverymethod;

use Illuminate\Http\Resources\Json\Resource;

class DeliveryMethodResource extends Resource
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
            'id'=> $this->delivery_id,
            'title'=>$this->delivery_title,
            'minTime'=>$this->min_time,
            'maxTime'=>$this->max_time,
            'cost'=>$this->cost_price,
            'status'=>$this->delivery_status,
        ];
    }
}
