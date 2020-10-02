<?php

namespace App\Http\Resources\buyer;

use App\Http\Resources\user\UserResource;
use Illuminate\Http\Resources\Json\Resource;

class BuyerResource extends Resource
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
            'id'=>$this->buyer_id,
            'address'=>$this->buyer_address,
            'status'=>$this->buyer_status,
            'user'=>  new UserResource($this->whenLoaded('user'))
        ];
    }
}
