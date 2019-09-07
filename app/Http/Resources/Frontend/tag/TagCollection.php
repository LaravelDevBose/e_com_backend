<?php

namespace App\Http\Resources\Frontend\tag;

use Illuminate\Http\Resources\Json\Resource;

class TagCollection extends Resource
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
            'id'=>$this->tag_id,
            'title'=>$this->tag_title,
            'slug'=>$this->tag_slug
        ];
    }
}
