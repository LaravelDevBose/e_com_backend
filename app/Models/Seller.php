<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
    const ShopStatus = [
        'Active'=>1,
        'Pending'=>2,
        'Un-Verified'=>3,
        'Block'=>4,
    ];

    protected $table ='sellers';

    protected $primaryKey ='seller_id';

    protected $fillable=[
        'user_id',
        'shop_name',
        'shop_address',
        'shop_phone',
        'shop_email',
        'shop_status',
    ];
    protected $appends=[
        'status_label'
    ];

    public function getStatusLabelAttribute()
    {
        $shopStatus = array_flip(Self::ShopStatus);
        return $shopStatus[$this->attributes['shop_status']];
    }

    public function scopeNotDelete($query)
    {
        return $query->where('shop_status', '!=', config('app.delete'));
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id')->where('is_seller', config('app.one'));
    }

    public function products(){
        return $this->hasMany(Product::class, 'seller_id', 'seller_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'seller_id', 'seller_id');
    }

    public function shop(){
        return $this->hasOne(Shop::class, 'seller_id', 'seller_id');
    }
}
