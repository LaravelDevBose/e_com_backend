<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsedCoupon extends Model
{
    protected $table = 'used_coupons';
    protected $primaryKey='used_coupon_id';

    protected $fillable = [
        'coupon_id',
        'order_id',
        'user_id',
        'coupon_amount',
    ];
}
