<?php

namespace App\Http\Resources\Frontend\tag;
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
        ];
    }
}
