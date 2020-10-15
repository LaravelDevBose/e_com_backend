<?php

namespace App\Http\Resources\Frontend\shipping;

use Illuminate\Http\Resources\Json\Resource;

class ShippingResource extends Resource
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
            'id'=>$this->shipping_id,
            'firstName'=>$this->first_name,
            'lastName'=>$this->last_name,
            'phoneNo'=>$this->phone_no,
            'address'=>$this->address,
            'city'=>$this->city,
            'state'=>$this->state,
            'postalCode'=>$this->postal_code,
            'district'=>$this->district,
            'region'=>$this->region,
//            'fullAddress'=>$this->full_address,
        ];
    }
}
