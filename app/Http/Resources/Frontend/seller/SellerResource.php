<?php

namespace App\Http\Resources\seller;

use App\Http\Resources\shop\ShopResource;
use App\Http\Resources\user\UserResource;
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
            'userId'=>$this->user_id,
            'name'=>$this->seller_name,
            'email'=>$this->seller_email,
            'phone'=>$this->seller_phone,
            'address'=>$this->seller_address,
            'type'=>$this->seller_type,
            'shop'=> new ShopResource($this->whenLoaded('shop')),
            'user'=> new UserResource($this->whenLoaded('user')),
        ];
    }
}
