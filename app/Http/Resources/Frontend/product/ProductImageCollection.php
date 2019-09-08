<?php

namespace App\Http\Resources\Frontend\product;

use App\Http\Resources\attachment\AttachmentResource;
use Illuminate\Http\Resources\Json\Resource;

class ProductImageCollection extends Resource
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
            'primaryID'=>$this->pri_id,
            'model_no'=>$this->model,
            'attachment_id'=>$this->attachment_id,
            'attachment'=>new AttachmentResource($this->attachment)
        ];
    }
}
