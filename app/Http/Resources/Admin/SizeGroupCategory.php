<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Category as CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SizeGroupCategory extends JsonResource
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
            'group_id'=> $this->size_group_id,
            'category'=> [
                'name'=>$this->category->category_name ?? '' ,
            ],
            'category_name'=>$this->category->category_name ?? ''
        ];
    }
}
