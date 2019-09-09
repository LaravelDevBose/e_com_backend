<?php

namespace App\Http\Resources\Frontend\skinType;

use Illuminate\Http\Resources\Json\Resource;

class SkinTypeResource extends Resource
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
            'id'=>$this->skin_type_id,
            'title'=>$this->skin_type,
        ];
    }
}
