<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Frontend\attachment\AttachmentResource;
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
            'seller_id'=>$this->seller_id,
            'name'=>$this->shop_name,
            'slug'=>$this->shop_slug,
            'address'=>$this->shop_address,
            'phone_no'=>$this->phone_no,
            'email'=>$this->shop_email,
            'category'=>$this->shop_category,
            'min_deli_day'=>$this->min_deli_day,
            'max_deli_day'=>$this->max_deli_day,
            'logo'=> new AttachmentResource($this->whenLoaded('shopLogo')),
            'banner'=> new AttachmentResource($this->whenLoaded('banner')),
        ];
    }
}
