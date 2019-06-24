<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $table = 'product_variations';

    protected $primaryKey = 'variation_id';

    protected $fillable =[
        'product_id',
        'seller_sku',
        'pri_id',
        'pri_model',
        'sec_id',
        'sec_model',
        'quantity',
        'price',
        'special_price',
        'gift_product_id',
        'gift_product_sku',
    ];

}
