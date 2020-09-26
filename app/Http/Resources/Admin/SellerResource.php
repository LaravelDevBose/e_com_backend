<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
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
            'email'=>$this->seller_email,
            'phone'=>$this->seller_phone,
            'address'=>$this->seller_address,
            'shop_name'=>$this->shop_name,
            'shop_address'=>$this->shop_address,
            'shop_phone'=>$this->shop_phone,
            'shop_email'=>$this->shop_email,
            'shop_category'=>$this->shop_category,
            'status'=>$this->seller_status,
        ];
    }
}
