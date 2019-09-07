<?php

namespace App\Http\Resources\Frontend\product;

use App\Http\Resources\attachment\AttachmentResource;
use App\Http\Resources\brand\BrandResource;
use App\Http\Resources\category\CategoryResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
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
            'id'=>$this->product_id,
            'sku'=>$this->product_sku,
            'category'=> new CategoryResource($this->category),
            'brandId'=> $this->brand_id,
            'brand'=> new BrandResource($this->brand),
            'productName'=>$this->product_name,
            'highlight'=>$this->highlight,
            'description'=>$this->description,
            'en_productName'=>$this->lang_product_name,
            'en_highlight'=>$this->lang_highlight,
            'en_description'=>$this->lang_description,
            'dangersGoods'=>Product::dangers_goods_data($this->dangers_goods),
            'inBbox'=>$this->what_in_box,
            'packageWeight'=>$this->package_weight,
            'packageLength'=>$this->package_length,
            'packageWidth'=>$this->package_width,
            'packageHeight'=>$this->package_height,
            'delivery_cost1'=>$this->delivery_cost1,
            'delivery_cost2'=>$this->delivery_cost2,
            'product_status'=>$this->product_status,
            'warrantyType'=>Product::WarrantyType[$this->warranty_type],
            'videoUrl'=>$this->video_url,
            'thumbImage'=>new AttachmentResource($this->thumbImage),
            'slug'=>$this->product_slug,
            'productDetails'=> new ProductDetailsResource($this->productDetails),
            'images'=> ProductImageCollection::collection($this->productImages),
            'variations'=>ProductVariationCollection::collection($this->variations),
            'singleVariation'=> new ProductVariationResource($this->singleVariation),
            'links'=>[

            ]
        ];
    }
}
