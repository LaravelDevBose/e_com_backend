<?php

namespace App\Http\Resources\Frontend\attachment;

use Illuminate\Http\Resources\Json\Resource;

class AttachmentResource extends Resource
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
            'attachment_id'=>$this->attachment_id,
            'image_path'=>$this->image_path,
        ];
    }
}
