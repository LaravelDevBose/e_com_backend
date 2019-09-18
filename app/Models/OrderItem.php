<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey  = 'item_id';

    protected $fillable = [
        'order_id',
        'buyer_id',
        'seller_id',
        'product_id',
        'product_name',
        'size_id',
        'size',
        'color_id',
        'color',
        'brand_id',
        'brand',
        'qty',
        'subtotal',
        'discount',
        'total_price'
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }

    public function seller(){
        return $this->belongsTo(Seller::class, 'seller_id', 'seller_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id', 'size_id');
    }

    public function color(){
        return $this->belongsTo(Color::class, 'color_id', 'color_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }
}
