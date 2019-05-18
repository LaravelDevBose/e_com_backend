<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment as AttachmentResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Voucher extends JsonResource
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
            'id'=>$this->voucher_id,
            'title'=>$this->voucher_name,
            'start_date'=>Carbon::parse($this->voucher_start)->format('d M Y - H:i A'),
            'end_date'=>Carbon::parse($this->voucher_end)->format('d M Y - H:i A'),
            'type'=>\App\Models\Voucher::VoucherType[$this->voucher_type],
            'code'=>ucwords($this->voucher_code),
            'total_issued'=>$this->voucher_issued,
            'discount_type'=>\App\Models\Voucher::DiscountType[$this->discount_type],
            'discount_amount'=>$this->discount_value,
            'max_discount'=>$this->max_discount,
            'min_order'=>$this->min_order_value,
            'usage_limit'=>$this->usage_limit,
            'use_in'=>\App\Models\Voucher::ApplyTo[$this->apply_to],
            'voucher_image'=>new AttachmentResource($this->whenLoaded('attachment')),
            'start_from'=>Carbon::parse($this->collect_start)->format('d M Y - H:i A'),
            'voucher_status'=>($this->voucher_status == config('app.active'))? config('app.activeView') : config('app.inactiveView'),
            'status'=>$this->voucher_status
        ];
    }
}
