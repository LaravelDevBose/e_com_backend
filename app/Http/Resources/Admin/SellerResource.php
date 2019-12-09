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
            'user_id'=>$this->user_id,
            'name'=>$this->seller_name,
            'email'=>$this->seller_email,
            'phone'=>$this->seller_phone,
            'address'=>$this->seller_address,
            'type'=>$this->seller_type,
            'status'=>$this->seller_status,
            'status_label'=>$this->status_label,
            'shop'=> new ShopResource($this->whenLoaded('shop')),
            'user'=> new UserResource($this->whenLoaded('user')),
        ];
    }
}
