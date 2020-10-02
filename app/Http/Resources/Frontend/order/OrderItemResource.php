<?php

namespace App\Http\Resources\order;

use App\Http\Resources\buyer\BuyerResource;
use App\Http\Resources\seller\SellerResource;
use Illuminate\Http\Resources\Json\Resource;

class OrderItemResource extends Resource
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
            'id'=>$this->item_id,
            'orderId'=>$this->order_id,
            'productId'=>$this->product_id,
            'productName'=>$this->product_name,
            'productType'=> $this->product->product_type,
            'sizeId'=>$this->sizeId,
            'size'=>$this->size,
            'colorId'=>$this->color_id,
            'color'=>$this->color,
            'brandId'=>$this->brand_id,
            'brand'=>$this->brand,
            'price'=>number_format($this->price, 2),
            'qty'=>$this->qty,
            'subtotal'=> number_format($this->subtotal, 2),
            'discount'=> number_format($this->discount, 2),
            'totalPrice'=> number_format($this->total_price, 2),
            'status'=>$this->item_status,
            'statusLabel'=>$this->item_status_label,
            'cancelBy'=>$this->cancel_by,
            'canceled'=>$this->canceled,
            'image'=>!empty($this->image->image_path)? $this->image->image_path : '',
            'seller'=> new SellerResource($this->whenLoaded('seller')),
            'order'=> new OrderResource($this->whenLoaded('order')),
            'buyer'=> new BuyerResource($this->whenLoaded('buyer')),
        ];
    }
}
