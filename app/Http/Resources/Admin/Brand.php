<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment as AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Brand extends JsonResource
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
            'id'=>$this->brand_id,
            'name'=>$this->brand_name,
            'status'=>$this->brand_status,
            'attachment'=> new AttachmentResource($this->whenLoaded('attachment')),
        ];
    }
}
