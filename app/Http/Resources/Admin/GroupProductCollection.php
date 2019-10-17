<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Admin\Product as ProductResource;

class GroupProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->group_id,
            'type'=>$this->group_title,
            'expiredAt'=>Carbon::parse($this->expired_at)->format('d-m-Y h:i:s A'),
            'position'=>$this->position,
            'status'=>$this->status,
            'product'=> new ProductResource($this->whenLoaded('product')),
        ];
    }
}
