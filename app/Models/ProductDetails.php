<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    const PeriodUnitS = 'day';
    const PeriodUnitM = 'days';

    protected $table ='product_details';

    protected $primaryKey = 'details_id';

    protected $fillable = [
        'product_id',
        'main_materials',
        'product_model',
        'num_of_pieces',
        'product_occasion',
        'color_shade',
        'skin_type_id',
        'extra_details',
        'warranty_policy',
        'warranty_policy_eng',
        'warranty_period',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function skinType(){
        return $this->belongsTo(SkinType::class, 'skin_type_id', 'skin_type_id');
    }
}
