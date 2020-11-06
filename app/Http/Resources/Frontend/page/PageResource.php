<?php

namespace App\Http\Resources\Frontend\page;

use App\Http\Resources\Attachment as AttachmentResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'id'=>$this->page_id,
            'title'=>$this->page_title,
            'menuTitle'=>$this->menu_title,
            'slug'=>$this->page_slug,
            'showIn'=>$this->show_in,
            'position'=>$this->menu_position,
            'content'=>$this->body_content,
            'extra_content'=>$this->other_content,
            'attachment'=> new AttachmentResource($this->whenLoaded('attachment')),
        ];
    }
}
