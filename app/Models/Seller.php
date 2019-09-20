<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id')->where('is_seller', config('app.one'));
    }

    public function products(){
        return $this->hasMany(Product::class, 'seller_id', 'seller_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'seller_id', 'seller_id');
    }
}
