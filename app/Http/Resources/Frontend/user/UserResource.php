<?php

namespace App\Http\Resources\Frontend\user;
use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
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
            'id'=>$this->id,
            'name'=>$this->full_name,
            'phone'=>$this->phone_no,
            'email'=>$this->email,
            'type'=>$this->account_type,
            'isBuyer'=>$this->is_buyer,
            'isSeller'=>$this->is_seller,
        ];
    }
}
