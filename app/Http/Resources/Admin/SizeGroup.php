<?php

namespace App\Http\Resources\Admin;
use App\Http\Resources\Admin\SizeGroupCategory as SizeGroupCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SizeGroup extends JsonResource
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
            'id'=>$this->size_group_id,
            'name'=>$this->size_group_title,
            'status'=>$this->size_group_status,
            'categories'=>SizeGroupCategoryResource::collection($this->whenLoaded('categories')),
        ];
    }
}
