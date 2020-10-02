<?php

namespace App\Http\Resources\shop;

use App\Http\Resources\attachment\AttachmentResource;
use App\Http\Resources\seller\SellerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
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
            'id'=>$this->shop_id,
            'sellerId'=> $this->seller_id,
            'name'=>$this->shop_name,
            'email'=>$this->shop_email,
            'phone'=>$this->phone_no,
            'address'=>$this->shop_address,
            'slug'=>$this->shop_slug,
            'logo'=> new AttachmentResource($this->whenLoaded('shopLogo')),
            'banner'=> new AttachmentResource($this->whenLoaded('banner')),
            'seller'=> new SellerResource($this->whenLoaded('seller')),
        ];
    }
}
