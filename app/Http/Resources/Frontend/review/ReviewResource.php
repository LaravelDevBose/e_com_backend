<?php

namespace App\Http\Resources\Frontend\review;

use App\Http\Resources\Frontend\product\ProductCollResource;
use App\Http\Resources\Frontend\user\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'user'=> new UserResource($this->whenLoaded('user')),
            'product'=> new ProductCollResource($this->whenLoaded('product'))
        ];
    }
}
