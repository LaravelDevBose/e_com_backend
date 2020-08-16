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

    const SellerType=[
        'Normal'=>1,
        'Individual'=>2
    ];

    protected $table ='sellers';

    protected $primaryKey ='seller_id';

    protected $fillable=[
        'user_id',
        'seller_name',
        'seller_email',
        'seller_phone',
        'seller_address',
        'seller_type',
        'seller_status',
        'seller_city',
    ];
    protected $appends=[
        'status_label'
    ];

    public function getStatusLabelAttribute()
    {
        $shopStatus = array_flip(Self::ShopStatus);
        if(empty($shopStatus[$this->attributes['seller_status']])){
            return 'Undefiend';
        }
        return $shopStatus[$this->attributes['seller_status']];
    }

    public function scopeNotDelete($query)
    {
        return $query->where('seller_status', '!=', config('app.delete'));
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
