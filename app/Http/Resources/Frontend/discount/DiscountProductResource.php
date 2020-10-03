<?php

namespace App\Http\Resources\Frontend\discount;

use App\Http\Resources\Frontend\product\ProductCollection;
use App\Http\Resources\Frontend\product\ProductCollResource;
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
            'percent'=>$this->discount_percent,
            'start_at'=>Carbon::parse($this->start_at)->format('d M Y H:i:s'),
            'expire_at'=>Carbon::parse($this->expire_at)->format('d M Y H:i:s'),
            'product'=> new ProductCollResource($this->whenLoaded('product')),
        ];
    }
}
