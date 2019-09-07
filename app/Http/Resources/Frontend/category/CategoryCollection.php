<?php

namespace App\Http\Resources\Frontend\category;

use App\Http\Resources\attachment\AttachmentResource;
use App\Http\Resources\product\ProductCollection;
use Illuminate\Http\Resources\Json\Resource;

class CategoryCollection extends Resource
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
            'id' => $this->category_id,
            'name' => $this->category_name,
            'slug' => $this->category_slug,
            'parent_id'=>$this->parent_id,
            'status'=>$this->category_status,
            'children'=>CategoryResource::collection($this->whenLoaded('children')),
            'parent'=>new CategoryResource($this->whenLoaded('parent')),
            'attachment'=> new AttachmentResource($this->whenLoaded('attachment')),
            'products'=> ProductCollection::collection($this->whenLoaded('product')),
            'links'=>[
                'products_link'=> '/category/'.$this->category_id.'/products',
            ]
        ];
    }
}
