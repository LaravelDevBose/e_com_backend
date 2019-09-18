<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Buyer extends User
{
    protected $table = 'buyers';
    protected $primaryKey = 'buyer_id';

    protected $fillable = [
        'user_id',
        'avatar_id',
        'buyer_address',
        'buyer_status',
    ];

    public function wishList(){
        return $this->hasMany(WishList::class, 'buyer_id', 'buyer_id');
    }

    public function addressBooks(){
        return $this->hasMany(AddressBook::class, 'buyer_id', 'buyer_id');
    }

    public function orders(){
        return $this->hasMany(Order::class, 'buyer_id', 'buyer_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'buyer_id', 'buyer_id');
    }

    public function billingInfos(){
        return $this->hasMany(BillingInfo::class, 'buyer_id', 'buyer_id');
    }

    public function shippingInfos(){
        return $this->hasMany(ShippingInfo::class, 'buyer_id', 'buyer_id');
    }

    public function paymentInfos(){
        return $this->hasMany(PaymentInfo::class, 'buyer_id', 'buyer_id');
    }
}
