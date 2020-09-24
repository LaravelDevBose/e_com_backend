<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'review_id';

    protected $fillable=[
        'user_id',
        'item_id',
        'product_id',
        'review',
        'rating',
        'review_status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('review_status', config('app.active'));
    }

    public function scopeNotDelete($query)
    {
        return $query->where('review_status','!=', config('app.delete'));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
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
