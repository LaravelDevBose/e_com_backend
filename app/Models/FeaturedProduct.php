<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    protected $table = 'featured_products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'feature_id',
        'product_id',
        'discount_price',
        'status',
    ];

    public function scopeIsActive($query){
        return $query->where('status', config('app.active'));
    }

    public function feature(){
        return $this->belongsTo(FeatureInfo::class, 'feature_id', 'feature_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
