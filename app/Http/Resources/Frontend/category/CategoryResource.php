<?php

namespace App\Http\Resources\Frontend\category;

use App\Http\Resources\Attachment as AttachmentResource;
use App\Http\Resources\product\ProductCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'slug' => $this->category_slug,
            'parent_id'=>$this->parent_id,
            'children'=> CategoryResource::collection($this->whenLoaded('children')),
            'attachment'=> new AttachmentResource($this->whenLoaded('attachment')),
            'icon'=> new AttachmentResource($this->whenLoaded('icon')),
            'parent'=> new CategoryResource($this->whenLoaded('parent')),
        ];
    }
}
