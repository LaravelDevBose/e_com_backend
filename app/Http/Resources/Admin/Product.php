<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Category as CategoryResource;
use App\Http\Resources\Admin\Brand as BrandResource;
use App\Http\Resources\Attachment as AttachmentResource;
use Illuminate\Http\Resources\Json\Resource;

class Product extends Resource
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
            'product_sku'=>$this->product_sku,
            'category_id'=>$this->category_id,
            'brand_id'=>$this->brand_id,
            'product_name'=>$this->product_name,
            'highlight'=>$this->highlight,
            'description'=>$this->description,
            'product_status'=>$this->product_status,
            'video_url'=>$this->video_url,
            'product_type'=>$this->product_type,
            'total_qty'=>$this->variations->sum('quantity'),
            'thumbImage'=> new AttachmentResource($this->whenLoaded('thumbImage')),
            'category'=>new CategoryResource($this->whenLoaded('category')),
            'brand'=>new BrandResource($this->whenLoaded('brand')),
            'details'=>new ProductDetailsResource($this->whenLoaded('productDetails')),
            'variations'=> ProductVariationResource::collection($this->whenLoaded('variations')),
            'variation'=> new ProductVariationResource($this->whenLoaded('variation')),
            'productImages'=> ProductImageResource::collection($this->productImages),
            'seller'=> new SellerResource($this->whenLoaded('seller')),
            'tags'=> ProductTagResource::collection($this->whenLoaded('tags')),
        ];
    }
}
