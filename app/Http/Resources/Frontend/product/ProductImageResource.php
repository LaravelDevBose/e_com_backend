<?php

namespace App\Http\Resources\product;

use App\Http\Resources\attachment\AttachmentResource;
use Illuminate\Http\Resources\Json\Resource;

class ProductImageResource extends Resource
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
            'id'=>$this->image_id,
            'primaryId'=>$this->pri_id,
            'modelNo'=>$this->model,
            'attachment'=>new AttachmentResource($this->attachment)
        ];
    }
}
