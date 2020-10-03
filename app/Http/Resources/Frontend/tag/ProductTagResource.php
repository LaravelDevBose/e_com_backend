<?php

namespace App\Http\Resources\Frontend\tag;

use Illuminate\Http\Resources\Json\Resource;

class ProductTagResource extends Resource
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
            'id'=>$this->pro_tag_id,
            'tagId'=>$this->tag_id,
            'tag'=> new TagResource($this->whenLoaded('tag'))
        ];
    }
}
