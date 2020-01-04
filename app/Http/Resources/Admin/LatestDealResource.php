<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class LatestDealResource extends JsonResource
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
            'id'=>$this->latest_deal_id,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            'status'=>$this->status,
            'deal_products'=> LatestDealProductResource::collection($this->deal_products),
        ];
    }
}
