<?php

namespace App\Http\Resources\product;

use App\Http\Resources\attachment\AttachmentResource;
use App\Http\Resources\brand\BrandResource;
use App\Http\Resources\category\CategoryResource;
use App\Http\Resources\review\ReviewResource;
use App\Http\Resources\seller\SellerResource;
use App\Http\Resources\shop\ShopResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    private $price = 0;
    private $prvPrice = 0;
    private $discount = 0;

    public function __construct($resource)
    {
        if ($resource->product_type == Product::ProductType['Variation'] && !empty($resource->singleVariation)){

            if (!empty($resource->discount_price) && $resource->discount_price > 0) {
                $this->prvPrice = $resource->singleVariation->price;
                $this->price = ($resource->singleVariation->price - $resource->discount_price);
                $this->discount = $resource->discount_price;
            } else {
                $this->price = $resource->singleVariation->price;
            }

        } else {
            if (!empty($resource->discount_price) && $resource->discount_price > 0) {
                $this->prvPrice = $resource->product_price;
                $this->price = ($resource->product_price - $resource->discount_price);
                $this->discount = $resource->discount_price;

            } else {
                $this->price = $resource->product_price;
            }
        }
        parent::__construct($resource);
    }

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
            'name' => $this->product_name,
            'sku'=>$this->product_sku,
            'slug'=>$this->product_slug,
            'category'=> new CategoryResource($this->category),
            'brand'=> new BrandResource($this->brand),
            'highlight'=>$this->highlight,
            'description'=>$this->description,
            'productType' => $this->product_type,
            'prvPrice' => $this->prvPrice,
            'price' => $this->price,
            'qty' => $this->product_qty,
            'discount' => $this->discount,
            'packageWeight'=>$this->package_weight,
            'packageLength'=>$this->package_length,
            'packageWidth'=>$this->package_width,
            'packageHeight'=>$this->package_height,
            'condition'=>$this->product_condition,
            'status'=>$this->product_status,
            'statusLabel'=>$this->status_label,
            'mallProduct'=> (!empty($this->seller_id) && $this->seller_id ==1) ? true : false,
            'isFavorite'=> $this->is_favorite,
            'productCity'=> $this->product_city_name,
            'cityKey'=>$this->product_city,
            'sellerSku'=>$this->seller_sku,
            'thumbImage'=>new AttachmentResource($this->whenLoaded('thumbImage')),
            'details'=> new ProductDetailsResource($this->productDetails),
            'images'=> ProductImageResource::collection($this->productImages),
            'variations'=>ProductVariationResource::collection($this->whenLoaded('variations')),
            'singleVariation'=> new ProductVariationResource($this->whenLoaded('singleVariation')),
            'seller'=> new SellerResource($this->whenLoaded('seller')),
            'reviews'=> ReviewResource::collection($this->whenLoaded('reviews')),
            'mallCompName'=> (!empty($this->seller_id) && $this->seller_id ==1 && !empty($this->mall_comp_name)) ?  $this->mall_comp_name : '',
            'mallCompLogo'=> new AttachmentResource($this->mallLogo),

        ];
    }
}
