<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Category as CategoryResource;
use App\Http\Resources\Admin\Brand as BrandResource;
use App\Http\Resources\Attachment as AttachmentResource;
use App\Models\AddressBook;
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
            'lang_product_name'=>$this->lang_product_name,
            'lang_highlight'=>$this->lang_highlight,
            'lang_description'=>$this->lang_description,
            'dangers_goods'=>$this->dangers_goods,
            'what_in_box'=>$this->what_in_box,
            'package_weight'=>$this->package_weight,
            'package_length'=>$this->package_length,
            'package_width'=>$this->package_width,
            'package_height'=>$this->package_height,
            'delivery_cost1'=>$this->delivery_cost1,
            'delivery_cost2'=>$this->delivery_cost2,
            'product_status'=>$this->product_status,
            'warranty_type'=>$this->warranty_type,
            'video_url'=>$this->video_url,
            'product_type'=>$this->product_type,
            'product_qty'=>$this->product_qty,
            'product_price'=>$this->product_price,
            'seller_sku'=>$this->seller_sku,
            'condition'=>$this->product_condition,
            'discount'=>$this->discount_price,
            'product_city'=> $this->product_city,
            'thumbImage'=> new AttachmentResource($this->whenLoaded('thumbImage')),
            'category'=>new CategoryResource($this->whenLoaded('category')),
            'brand'=>new BrandResource($this->whenLoaded('brand')),
            'details'=>new ProductDetailsResource($this->whenLoaded('productDetails')),
            'variations'=> ProductVariationResource::collection($this->whenLoaded('variations')),
            'productImages'=> ProductImageResource::collection($this->productImages),
            'seller'=> new SellerResource($this->whenLoaded('seller')),
            'mall_comp_name'=>$this->mall_comp_name,
            'mall_logo'=>new AttachmentResource($this->whenLoaded('mallLogo')),
            'mall_product'=> $this->mall_product,
            'total_qty'=>($this->product_type === 1)? $this->product_qty : $this->variations->sum('quantity'),
        ];
    }
}
