<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    const WarrantyType=[
        1=>'International Manufacturer Warranty',
        2=>'Non-local warranty',
        3=>'Local seller warranty',
        4=>'No Warranty',
        5=>'International Seller Warranty',
    ];

    const DangersGoods =[
        1=>'Battery',
        2=>'Liquid',
        3=>'None',
        4=>'Flammable',
    ];

    const ProductStatus=[

    ];

    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable =[
        'product_sku',
        'category_id',
        'brand_id',
        'product_name',
        'highlight',
        'description',
        'lang_product_name',
        'lang_highlight',
        'lang_description',
        'dangers_goods',
        'what_in_box',
        'package_weight',
        'package_length',
        'package_width',
        'package_height',
        'delivery_cost1',
        'delivery_cost2',
        'product_status',
        'warranty_type',
        'video_url',
    ];

    public function scopeNotDelete($query){
        return $query->where('product_status', '!=', config('app.delete'));
    }

    public static function product_sku_generate(){
        $sku = '';
        for ($i=1; $i<=4; $i++){
            $sku.= Str::random(4);
            if($i != 4){
                $sku .= '-';
            }
        }

        return $sku;
    }



    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

    public function productDetails(){
        return $this->hasOne(ProductDetails::class, 'product_id', 'product_id');
    }

    public function variations(){
        return $this->hasMany(ProductVariation::class, 'product_id', 'product_id');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }
}
