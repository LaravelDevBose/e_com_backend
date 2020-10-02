<?php

namespace App\Http\Resources\brand;

use App\Http\Resources\attachment\AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
            'slug'=>$this->brand_slug,
            'attachment'=>new AttachmentResource($this->whenLoaded('attachment')),
        ];
    }
}
