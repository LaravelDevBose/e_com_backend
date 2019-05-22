<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment as AttachmentResource;
use App\Http\Resources\Admin\CampaignProduct as CampaignProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Campaign extends JsonResource
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
            'id'=>$this->campaign_id,
            'title'=>$this->campaign_title,
            'start_date'=>$this->campaign_start,
            'end_date'=>$this->campaign_end,
            'details'=>$this->campaign_details,
            'attachment'=> new AttachmentResource($this->whenLoaded('attachment')),
            'status_name'=>\App\Models\Campaign::Status[$this->campaign_status],
            'status'=>$this->campaign_status,
            'products'=>CampaignProductResource::collection($this->whenLoaded('campaign_products')),
        ];
    }
}
