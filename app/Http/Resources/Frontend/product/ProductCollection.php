<?php

namespace App\Http\Resources\Frontend\product;

use App\Http\Resources\Frontend\attachment\AttachmentResource;
use App\Http\Resources\Frontend\brand\BrandResource;
use App\Http\Resources\Frontend\category\CategoryResource;
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
        return [
            'id'=>$this->product_id,
            'productName'=>$this->product_name,
            'eng_name'=>$this->lang_product_name,
            'product_slug'=>$this->product_slug,
            'category'=> new CategoryResource($this->category),
            'brand'=> new BrandResource($this->brand),
            'singleVariation' => new ProductVariationResource($this->singleVariation),
            'thumbImage'=>new AttachmentResource($this->thumbImage),
            'seller'=>$this->seller,
            'shop'=>$this->seller->shop,
            'product_type'=>$this->product_type,
            'qty'=>$this->product_qty,
            'price'=>$this->product_price,
            'seller_sku'=>$this->seller_sku,
            'links'=>[
                'product_url'=>route('front.product',$this->product_slug),
            ]
        ];
    }
}
