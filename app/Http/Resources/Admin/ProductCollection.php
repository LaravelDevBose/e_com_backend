<?php

namespace App\Http\Resources\Admin;

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
        return [
            'id'=>$this->product_id,
            'product_title'=>$this->product_name,
            'sku'=>$this->product_sku,
            'category'=>New CategoryResource($this->whenLoaded('category')),
            'brand'=>New BrandResource($this->whenLoaded('brand')),
            'total_qty'=>$this->variations->sum('quantity'),
            'status'=>$this->product_status,
            'status_label'=>$this->statusLabel($this->product_status),
        ];
    }

    private function statusLabel($value){
        switch ($value):
            case 0:
                return 'Delete';
                break;
            case 1:
                return 'Active';
                break;
            case 2:
                return 'Inactive';
                break;
            default:
                return 'Undefined';
                break;
        endswitch;
    }
}
