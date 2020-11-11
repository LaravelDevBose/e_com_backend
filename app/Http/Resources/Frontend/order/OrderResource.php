<?php

namespace App\Http\Resources\Frontend\order;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Frontend\user\UserResource;
use App\Http\Resources\Frontend\payment\PaymentResource;
use App\Http\Resources\Frontend\shipping\ShippingResource;
use App\Http\Resources\Frontend\deliveryMethod\DeliveryMethodResource;

class OrderResource extends JsonResource
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
            'id'=>$this->order_id,
            'order_no' =>$this->order_no,
            'user_id'=>$this->user_id,
            'total_qty'=>$this->total_qty,
            'subtotal'=>$this->sub_total,
            'discount'=>$this->discount,
            'total'=>$this->order_total,
            'date'=>$this->order_date,
            'delivery_charge'=> number_format($this->delivery_charge, 2),
            'status'=>$this->order_status,
            'statusLabel'=>$this->status_label,
            'user'=> new UserResource($this->whenLoaded('user')),
            'orderItems'=> OrderItemResource::collection($this->whenLoaded('orderItems')),
            'shippingInfo'=> new ShippingResource($this->whenLoaded('shipping')),
            'paymentInfo'=> new PaymentResource($this->whenLoaded('payment')),
            'deliveryMethod'=> new DeliveryMethodResource($this->whenLoaded('deliveryMethod')),
        ];
    }
}
