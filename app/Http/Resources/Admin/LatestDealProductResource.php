<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Product as ProductResource;
class LatestDealProductResource extends JsonResource
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
            'product'=> new ProductResource($this->product),
            'status'=>$this->status,
        ];
    }
}
