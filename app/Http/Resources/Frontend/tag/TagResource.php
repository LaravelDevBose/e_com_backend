<?php

namespace App\Http\Resources\Frontend\tag;

use App\Http\Resources\product\ProductCollection;
use Illuminate\Http\Resources\Json\Resource;

class TagResource extends Resource
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
            'id'=>$this->tag_id,
            'title'=>$this->tag_title,
            'slug'=>$this->tag_slug,
            'products'=> ProductCollection::collection($this->whenLoaded('products')),
            'links'=>[
                'products_link'=>url('tag/'.$this->tag_id.'products'),
            ]
        ];
    }
}
