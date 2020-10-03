<?php

namespace App\Http\Resources\Frontend\color;

use Illuminate\Http\Resources\Json\Resource;

class ColorResource extends Resource
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
            'id'=>$this->color_id,
            'name'=>$this->color_name,
            'code'=>$this->color_code,
        ];
    }
}
