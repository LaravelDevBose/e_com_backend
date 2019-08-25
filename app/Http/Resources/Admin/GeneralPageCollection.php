<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment as AttachmentResource;
use Illuminate\Http\Resources\Json\Resource;

class GeneralPageCollection extends Resource
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
            'showIn'=>$this->_MenuShow($this->show_in),
            'position'=>$this->menu_position,
            'attachment'=> new AttachmentResource($this->whenLoaded('attachment')),
            'status'=>$this->page_status,
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
