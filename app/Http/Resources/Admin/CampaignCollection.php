<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\CampaignProduct as CampaignProductResource;
use App\Http\Resources\Attachment as AttachmentResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignCollection extends JsonResource
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
            'id'=>$this->campaign_id,
            'title'=>$this->campaign_title,
            'slug'=>$this->campaign_slug,
            'start_date'=>Carbon::parse($this->campaign_start)->format('d-M-y'),
            'end_date'=>Carbon::parse($this->campaign_end)->format('d-M-y'),
            'reg_date'=>Carbon::parse($this->camp_reg_date)->format('d-M-y'),
            'details'=>$this->campaign_details,
            'limit'=>$this->seller_pro_limit,
            'campaign_rules'=>$this->campaign_rules,
            'total_product'=>$this->total_product,
            'adds_position'=>$this->adds_position,
            'attachment'=> new AttachmentResource($this->attachment),
            'adds_image'=> new AttachmentResource($this->whenLoaded('addsImage')),
            'status'=>$this->campaign_status,
            'status_view'=>\App\Models\Campaign::statusView($this->campaign_status),
            'products'=>CampaignProductResource::collection($this->whenLoaded('campaign_products')),
        ];
    }
}
