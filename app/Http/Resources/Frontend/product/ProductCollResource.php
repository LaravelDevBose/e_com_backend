<?php

namespace App\Http\Resources\product;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollResource extends JsonResource
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
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->product_id,
            'name' => $this->product_name,
            'slug' => $this->product_slug,
            'productType' => $this->product_type,
            'prvPrice' => $this->prvPrice,
            'price' => $this->price,
            'discount' => $this->discount,
            'image'=>$this->thumbImage->image_path,
            'imageId'=>$this->thumbImage->attachment_id,
            'mallProduct'=> (!empty($this->seller_id) && $this->seller_id ==1) ? true : false,
            'isFavorite'=> $this->is_favorite,
            'mallCompName'=> (!empty($this->seller_id) && $this->seller_id ==1 && !empty($this->mall_comp_name)) ?  $this->mall_comp_name : '',
        ];
    }

}
