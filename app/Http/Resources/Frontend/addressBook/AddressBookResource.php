<?php

namespace App\Http\Resources\Frontend\addressBook;

use Illuminate\Http\Resources\Json\Resource;

class AddressBookResource extends Resource
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
            'id'=>$this->address_id,
            'firstName'=>$this->first_name,
            'lastName'=>$this->last_name,
            'phoneNo'=>$this->phone_no,
            'address'=>$this->address,
            'city'=>$this->city,
            'state'=>$this->state,
            'district'=>$this->district,
            'region'=>$this->region,
            'postalCode'=>$this->postal_code,
            'country'=>$this->country,
            'status'=> $this->address_status,
//            'fullAddress'=>$this->full_address,
        ];
    }
}
