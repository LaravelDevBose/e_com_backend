<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{

    protected $table ='product_details';

    protected $primaryKey = 'details_id';

    protected $fillable = [
        'product_id',
        'main_materials',
        'product_model',
        'num_of_pieces',
        'product_occasion',
        'color_shade',
        'skin_type',
        'extra_details',
        'gift_product_id',
    ];
}
