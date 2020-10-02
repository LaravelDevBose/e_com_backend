<?php

namespace App\Http\Resources\order;

use App\Http\Resources\deliverymethod\DeliveryMethodResource;
use App\Http\Resources\payment\PaymentResource;
use App\Http\Resources\shipping\ShippingResource;
use App\Http\Resources\user\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'orderNo' =>$this->order_no,
            'buyerId'=>$this->buyer_id,
            'totalQty'=>$this->total_qty,
            'subtotal'=>$this->sub_total,
            'discount'=>$this->discount,
            'total'=>$this->total,
            'date'=>$this->order_date,
            'deliveryCharge'=> number_format($this->delivery_charge, 2),
            'status'=>$this->order_status,
            'statusLabel'=>$this->status_label,
            'buyer'=> new UserResource($this->whenLoaded('buyer.user')),
            'orderItems'=> new OrderItemCollection($this->whenLoaded('orderItems')),
            'shippingInfo'=> new ShippingResource($this->whenLoaded('shipping')),
            'paymentInfo'=> new PaymentResource($this->whenLoaded('payment')),
            'deliveryMethod'=> new DeliveryMethodResource($this->whenLoaded('deliveryMethod')),
        ];
    }
}
