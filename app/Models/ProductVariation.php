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
        'color_id',
        'size_id',
        'quantity',
        'price',
        'variation_status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    protected $casts = ['price'=> 'float'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
    public function color(){
        return $this->belongsTo(Color::class, 'color_id', 'color_id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id', 'size_id');
    }

}
