<?php

namespace App\Http\Resources\Frontend\deliverycost;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DeliveryCostCollection extends ResourceCollection
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
