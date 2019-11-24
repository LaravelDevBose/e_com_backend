<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'review_id';

    protected $fillable=[
        'buyer_id',
        'item_id',
        'product_id',
        'review',
        'rating',
        'review_status',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('review_status', config('app.active'));
    }

    public function scopeNotDelete($query)
    {
        return $query->where('review_status','!=', config('app.delete'));
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }

    public function item()
    {
        return $this->belongsTo(OrderItem::class, 'item_id', 'item_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
