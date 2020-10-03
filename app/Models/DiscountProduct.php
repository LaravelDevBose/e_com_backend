<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DiscountProduct extends Model
{
    protected $table = 'discount_products';
    protected $primaryKey='dis_pro_id';
    protected $fillable=[
        'product_id',
        'discount_percent',
        'start_at',
        'expire_at',
        'status',
    ];

    protected $appends=['is_live'];

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }

    public function scopeNotDelete($query)
    {
        return $query->where('status', '!=', config('app.delete'));
    }
    public function scopeLive($query)
    {
        return $query->where('status', config('app.active'))
            ->whereDate('start_at', '<', Carbon::now())
            ->whereDate('expire_at', '>', Carbon::now());
    }

    public function getIsLiveAttribute()
    {
        $discount = self::where('status', config('app.active'))
            ->whereDate('start_at', '<', Carbon::now())
            ->whereDate('expire_at', '>', Carbon::now())->first();
        if(!empty($discount)){
            return true;
        }
        return false;
    }
}
