<?php

namespace App\Http\Resources\Frontend\coupon;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
        ];
    }
}
