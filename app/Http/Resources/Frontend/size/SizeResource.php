<?php

namespace App\Http\Resources\Frontend\size;

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
        return parent::toArray($request);
    }
}
