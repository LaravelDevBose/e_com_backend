<?php

namespace App\Http\Resources\Frontend\order;

use App\Http\Resources\Frontend\color\ColorResource;
use App\Http\Resources\Frontend\review\ReviewResource;
use App\Http\Resources\Frontend\size\SizeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'slug'=> $this->product->product_slug,
            'sizeId'=>$this->sizeId,
            'colorId'=>$this->color_id,
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
            'color'=>new ColorResource($this->color),
            'size'=> new SizeResource($this->size),
            'review'=> new ReviewResource($this->whenLoaded('review'))
        ];
    }
}
