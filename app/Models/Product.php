<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
