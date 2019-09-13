<?php

namespace App\Http\Resources\Frontend\category;

use App\Http\Resources\Frontend\attachment\AttachmentResource;
use App\Http\Resources\Frontend\product\ProductCollection;
use Illuminate\Http\Resources\Json\Resource;

class CategoryResource extends Resource
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
            'products'=> ProductCollection::collection($this->whenLoaded('product')),
            'links'=>[
                'products_link'=>'category/'.$this->category_id.'/products',
            ]
        ];
    }
}
