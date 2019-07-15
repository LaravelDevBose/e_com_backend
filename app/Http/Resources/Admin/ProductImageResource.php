<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment as AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
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
            'primaryID'=>$this->pri_id,
            'model_no'=>$this->model,
            'attachment_id'=>$this->attachment_id,
            'image'=>new AttachmentResource($this->whenLoaded('attachment'))
        ];
    }
}
