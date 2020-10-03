<?php

namespace App\Http\Resources\Frontend\product;

use App\Http\Resources\Attachment as AttachmentResource;
use App\Http\Resources\Frontend\brand\BrandResource;
use App\Http\Resources\Frontend\category\CategoryResource;
use App\Http\Resources\Frontend\discount\DiscountProductResource;
use App\Http\Resources\Frontend\tag\ProductTagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->product_id,
            'sku'=>$this->product_sku,
            'name'=>$this->product_name,
            'slug'=>$this->product_slug,
            'highlight'=>$this->highlight,
            'description'=>$this->description,
            'total_qty'=>$this->variations->sum('quantity'),
            'image'=> new AttachmentResource($this->whenLoaded('thumbImage')),
            'category'=>new CategoryResource($this->whenLoaded('category')),
            'brand'=>new BrandResource($this->whenLoaded('brand')),
            'variations'=> ProductVariationResource::collection($this->whenLoaded('variations')),
            'variation'=> new ProductVariationResource($this->whenLoaded('variation')),
            'images'=> ProductImageResource::collection($this->whenLoaded('productImages')),
            'tags'=> ProductTagResource::collection($this->whenLoaded('tags')),
            'discount'=> new DiscountProductResource($this->whenLoaded('discount'))
        ];
    }

}
