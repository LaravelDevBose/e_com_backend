<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AdsBannerResource extends JsonResource
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
            'id'=>$this->ads_banner_id,
            'title'=> $this->ads_title,
            'trans_title'=> $this->ads_trans_title,
            'url'=> $this->ads_url,
            'position'=> $this->ads_position,
            'position_label'=> $this->position_label,
            'expired'=> Carbon::parse($this->ads_expired)->format('d M Y'),
            'status'=> $this->ads_status,
            'status_label'=>$this->status_label,
            'image'=> new Attachment($this->whenLoaded('image'))
        ];
    }
}
