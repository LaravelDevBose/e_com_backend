<?php

namespace App\Http\Resources\Frontend\product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductDetailsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
