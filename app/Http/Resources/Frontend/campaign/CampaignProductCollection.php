<?php

namespace App\Http\Resources\Frontend\campaign;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CampaignProductCollection extends ResourceCollection
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
