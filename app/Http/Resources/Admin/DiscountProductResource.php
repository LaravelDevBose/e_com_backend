<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountProductResource extends JsonResource
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
            'id'=>$this->dis_pro_id,
            'expire_at'=> Carbon::parse($this->expire_at)->format('d M Y'),
            'start_at'=> Carbon::parse($this->start_at)->format('d M Y'),
            'discount'=> $this->discount_percent,
            'status'=> $this->status,
            'is_live'=> $this->is_live,
            'product'=> new ProductCollection($this->whenLoaded('product')),
        ];
    }
}
