<?php

namespace App\Http\Resources\Admin;

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
            'tag'=> new Tag($this->whenLoaded('tag'))
        ];
    }
}
