<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Category as CategoryResource;
use App\Http\Resources\Attachment as AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
            'id' => $this->category_id,
            'name' => $this->category_name,
            'trans_name' => $this->trans_category_name,
            'label' => $this->category_name,
            'slug' => $this->category_slug,
            'parent_id'=>$this->parent_id,
            'status'=>$this->category_status,
            'is_show'=>$this->is_show,
            'children'=>CategoryResource::collection($this->whenLoaded('children')),
            'parent'=>new CategoryResource($this->whenLoaded('parent')),
            'attachment'=> new AttachmentResource($this->whenLoaded('attachment')),
            'sectionBanner'=> new AttachmentResource($this->whenLoaded('sectionBanner')),
            'iconImage'=> new AttachmentResource($this->whenLoaded('iconImage')),
        ];
    }
}
