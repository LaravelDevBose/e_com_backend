<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment as AttachmentResource;
use Illuminate\Http\Resources\Json\Resource;

class HomepageSectionCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->section_id,
            'title'=>$this->section_title,
            'type'=>$this->type_label,
            'position'=>$this->section_position,
            'status'=>$this->section_status,
            'banner'=> new AttachmentResource($this->whenLoaded('attachment')),
            'total_products'=>$this->sectionProducts->count('product_id'),
        ];
    }
}
