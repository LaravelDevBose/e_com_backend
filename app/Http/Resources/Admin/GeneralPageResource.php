<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment as AttachmentResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralPageResource extends JsonResource
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
            'show_in'=>$this->show_in,
            'showIn'=>$this->_MenuShow($this->show_in),
            'position'=>$this->menu_position,
            'content'=>$this->body_content,
            'extra_content'=>$this->other_content,
            'attachment'=> new AttachmentResource($this->whenLoaded('attachment')),
            'status'=>$this->page_status,
            'created_at'=>Carbon::parse($this->created_at)->format('d M Y'),
            'page_cat'=>$this->page_cat
        ];
    }

    private function _MenuShow($value){
        switch ($value){
            case 1:
                return 'Header';
                break;
            case 2:
                return 'Footer';
                break;
            case 3:
                return 'Header & Footer';
                break;
            default:
                return 'Undefined';
                break;

        }
    }
}
