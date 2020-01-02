<?php

namespace App\Http\Resources\Frontend\page;

use Illuminate\Http\Resources\Json\Resource;

class PageCollection extends Resource
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
            'id'=>$this->page_id,
            'title'=>$this->page_title,
            'menuTitle'=>$this->menu_title,
            'slug'=>$this->page_slug,
            'showIn'=>$this->show_in,
            'position'=>$this->menu_position,
            'category'=>$this->page_cat,
            'links'=>[

            ]
        ];
    }
}
