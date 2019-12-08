<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryMethod extends JsonResource
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
            'id'=>$this->delivery_id,
            'title'=>$this->delivery_title,
            'min_time'=> $this->min_time,
            'max_time'=> $this->max_time,
            'price'=> $this->cost_price,
            'status'=>$this->delivery_status,
            'status_label'=> $this->status_label,
        ];
    }
}
