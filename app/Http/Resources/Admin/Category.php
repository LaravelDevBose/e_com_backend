<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Category as CategoryResource;
use App\Http\Resources\Attachment;
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
            'label' => $this->category_name,
            'slug' => $this->category_slug,
            'parent_id'=>$this->parent_id,
            'status'=>$this->category_status,
            'children'=>CategoryResource::collection($this->whenLoaded('children')),
            'parent'=>new CategoryResource($this->whenLoaded('parent')),
            'image_path'=> new Attachment($this->whenLoaded('attachment')),
        ];
    }
}
