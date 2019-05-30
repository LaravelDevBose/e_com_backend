<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

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
    ];
}
