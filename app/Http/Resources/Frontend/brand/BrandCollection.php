<?php

namespace App\Http\Resources\Frontend\brand;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BrandCollection extends ResourceCollection
{

    public $collects = 'App\Http\Resources\Frontend\brand\BrandResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=> $this->collection
        ];
    }
}
