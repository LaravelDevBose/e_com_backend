<?php

namespace App\Http\Resources\Frontend\campaign;

use Illuminate\Http\Resources\Json\Resource;

class CampaignResource extends Resource
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
