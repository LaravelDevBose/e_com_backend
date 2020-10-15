<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    protected $table= 'coupon_codes';
    protected $primaryKey= 'coupon_id';
    protected $fillable = [
        'coupon_title',
        'coupon_code',
        'coupon_amount',
        'min_order',
        'coupon_qty',
        'expire_at',
        'attachment_id',
        'coupon_status',
    ];

    protected $appends=['is_live'];

    public function getIsLiveAttribute()
    {
        $coupon = self::where('coupon_status', config('app.active'))
            ->whereDate('expire_at', '>', Carbon::now())->first();
        if(!empty($coupon)){
            return true;
        }
        return false;
    }

    public function scopeIsActive($query)
    {
        return $query->where('coupon_status', config('app.active'));
    }

    public function scopeNotDelete($query)
    {
        return $query->where('coupon_status', '!=', config('app.delete'));
    }

    public function scopeIsLive($query)
    {
        return $query->where('coupon_status', config('app.active'))
            ->whereDate('expire_at', '>', Carbon::now());
    }

    public function attachment()
    {
        return $this->hasOne(Attachment::class, 'attachment_id', 'attachment_id');
    }

    public function used_coupons()
    {
        return $this->hasMany(UsedCoupon::class, 'coupon_id', 'coupon_id');
    }
}
