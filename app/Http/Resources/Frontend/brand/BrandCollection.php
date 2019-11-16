<?php

namespace App\Http\Resources\Frontend\brand;




use App\Http\Resources\Frontend\attachment\AttachmentResource;
use Illuminate\Http\Resources\Json\Resource;

class BrandCollection extends Resource
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
            'brand_id'=>$this->brand_id,
            'brand_name'=>$this->brand_name,
            'brand_slug'=>$this->brand_slug,
            'attachment'=>new AttachmentResource($this->whenLoaded('attachment'))
        ];
    }
}
