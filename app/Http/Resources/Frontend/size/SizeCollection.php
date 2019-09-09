<?php

namespace App\Http\Resources\Frontend\size;

use Illuminate\Http\Resources\Json\Resource;

class SizeCollection extends Resource
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
            'id'=>$this->size_id,
            'name'=>$this->size_name
        ];
    }
}
