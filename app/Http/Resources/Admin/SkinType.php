<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class SkinType extends JsonResource
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
            'skinType_title'=>$this->skin_type,
            'skinType_status'=>$this->skin_type_status
        ];
    }
}
