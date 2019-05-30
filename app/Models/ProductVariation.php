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
        'reference_id',
        'reference_model',
        'quantity',
        'price',
        'special_price',

    ];

}
