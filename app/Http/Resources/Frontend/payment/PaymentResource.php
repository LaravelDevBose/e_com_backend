<?php

namespace App\Http\Resources\payment;

use Illuminate\Http\Resources\Json\Resource;

class PaymentResource extends Resource
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
            'id'=> $this->payment_id,
            'price'=>$this->total_price,
            'invoiceNo'=> $this->invoice_no,
            'paidBy'=>$this->paid_by,
            'paidAt'=> $this->paid_at,
        ];
    }
}
