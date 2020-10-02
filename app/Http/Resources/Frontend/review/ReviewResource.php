<?php

namespace App\Http\Resources\review;

use App\Http\Resources\buyer\BuyerResource;
use App\Http\Resources\product\ProductCollResource;
use App\Http\Resources\user\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class ReviewResource extends Resource
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
            'id'=>$this->review_id,
            'review'=>$this->review,
            'rating'=>$this->rating,
            'date'=>Carbon::parse($this->created_at)->format('d M-Y'),
            'buyer'=> new BuyerResource($this->whenLoaded('buyer')),
        ];
    }
}
