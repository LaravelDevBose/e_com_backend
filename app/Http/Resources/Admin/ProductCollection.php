<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Attachment as AttachmentResource;
use App\Http\Resources\Admin\Category as CategoryResource;
use App\Http\Resources\Admin\Brand as BrandResource;
use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $statusLabel = \App\Models\Product::flipProductStatus();
        return [
            'id'=>$this->product_id,
            'product_title'=>$this->product_name,
            'product_slug'=>$this->product_slug,
            'sku'=>$this->product_sku,
            'category'=>New CategoryResource($this->whenLoaded('category')),
            'brand'=>New BrandResource($this->whenLoaded('brand')),
            'total_qty'=>($this->product_type === 1)? $this->product_qty : $this->variations->sum('quantity'),
            'status'=>$this->product_status,
            'status_label'=>$statusLabel[$this->product_status],
            'thumbnail'=> new AttachmentResource($this->whenLoaded('thumbImage')),
            'condition'=> $this->product_condition,
            'price'=>$this->product_price,
            'seller'=> new SellerResource($this->whenLoaded('seller'))
        ];
    }
}
