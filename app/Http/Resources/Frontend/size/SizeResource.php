<?php

namespace App\Http\Resources\size;

use Illuminate\Http\Resources\Json\Resource;

class SizeResource extends Resource
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
            'id'=>$this->size_id,
            'name'=>$this->size_name
        ];
    }
}
