<?php

namespace App\Http\Resources\Frontend\seller;

use Illuminate\Http\Resources\Json\Resource;

class SellerResource extends Resource
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
            'id'=>$this->seller_id,
            'name'=>$this->seller_name,
            'shop_name'=>$this->shop_name,
            'shop_address'=>$this->shop_address,
        ];
    }
}
