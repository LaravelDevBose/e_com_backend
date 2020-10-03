<?php

namespace App\Http\Resources\Frontend\product;

use App\Http\Resources\Attachment as AttachmentResource;
use App\Http\Resources\Frontend\brand\BrandResource;
use App\Http\Resources\Frontend\category\CategoryResource;
use App\Http\Resources\Frontend\review\ReviewResource;
use App\Http\Resources\Frontend\tag\ProductTagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'sku'=>$this->product_sku,
            'category_id'=>$this->category_id,
            'brand_id'=>$this->brand_id,
            'name'=>$this->product_name,
            'highlight'=>$this->highlight,
            'description'=>$this->description,
            'status'=>$this->product_status,
            'video_url'=>$this->video_url,
            'product_type'=>$this->product_type,
            'total_qty'=>$this->variations->sum('quantity'),
            'image'=> new AttachmentResource($this->whenLoaded('thumbImage')),
            'category'=>new CategoryResource($this->whenLoaded('category')),
            'brand'=>new BrandResource($this->whenLoaded('brand')),
            'details'=>new ProductDetailsResource($this->whenLoaded('productDetails')),
            'variations'=> ProductVariationResource::collection($this->whenLoaded('variations')),
            'variation'=> new ProductVariationResource($this->whenLoaded('variation')),
            'productImages'=> ProductImageResource::collection($this->whenLoaded('productImages')),
            'tags'=> ProductTagResource::collection($this->whenLoaded('tags')),

        ];
    }
}
