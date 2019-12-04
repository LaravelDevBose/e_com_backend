<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment as AttachmentResource;
use Illuminate\Http\Resources\Json\Resource;

class SliderCollection extends Resource
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
            'id'=>$this->slider_id,
            'title'=>$this->slider_title,
            'trans_title'=>$this->trans_slider_title,
            'subTitle'=>$this->sub_title,
            'trans_subTitle'=>$this->trans_sub_title,
            'btnText'=>$this->btn_text,
            'trans_btnText'=>$this->trans_btn_text,
            'btnUrl'=>$this->btn_url,
            'position'=>$this->slider_position,
            'attachment'=> new AttachmentResource($this->whenLoaded('attachment')),
            'status'=>$this->slider_status
        ];
    }
}
