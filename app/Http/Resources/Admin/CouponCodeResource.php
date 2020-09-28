<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponCodeResource extends JsonResource
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
            'id'=>$this->coupon_id,
            'title'=>$this->coupon_title,
            'code'=>$this->coupon_code,
            'amount'=>$this->coupon_amount,
            'min_order'=>$this->min_order,
            'qty'=>$this->coupon_qty,
            'expire'=> Carbon::parse($this->expire_at)->format('d-M Y'),
            'attachment' => $this->attachment_data(),
            'status'=>$this->coupon_status,
            'is_live'=>$this->is_live,
        ];
    }

    private function attachment_data()
    {
        if(!empty($this->attachment)){
            return new Attachment($this->whenLoaded('attachment'));
        }else{
            return [
                'image_path'=> asset('images/placeholder.png')
            ];
        }
    }
}
