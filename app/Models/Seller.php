<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
    protected $table ='sellers';
    protected $primaryKey ='seller_id';
    protected $fillable=[
        'seller_name',
        'seller_phone',
        'seller_address',
        'shop_name',
        'seller_email',
        'shop_address',
        'shop_phone',
        'shop_email',
        'logo_id',
        'shop_category',
        'seller_status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function scopeNotDelete($query)
    {
        return $query->where('seller_status', '!=', config('app.delete'));
    }

    public function scopeIsActive($query)
    {
        return $query->where('seller_status', config('app.active'));
    }

    public function products(){
        return $this->hasMany(Product::class, 'seller_id', 'seller_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'seller_id', 'seller_id');
    }
}
