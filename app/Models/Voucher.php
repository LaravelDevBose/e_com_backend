<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    const VoucherType=[
        1=>'Voucher Code',
//        2=>'Collectable'
    ];
    const ApplyTo=[
        1=>'Shop',
        2=>'SKU'
    ];

    const DiscountType = [
        1=>'Money Value Voucher',
        2=>'Percentage Value Voucher',
    ];

    protected $table= 'vouchers';

    protected $primaryKey = 'voucher_id';

    protected $fillable = [
        'voucher_name',
        'voucher_start',
        'voucher_end',
        'voucher_type',
        'voucher_code',
        'voucher_issued',
        'discount_type',
        'discount_value',
        'max_discount',
        'min_order_value',
        'usage_limit',
        'apply_to',
        'attachment_id',
        'collect_start',
        'voucher_status'
    ];

    public function scopeIsActive($query){
        return $query->where('voucher_status', config('app.active'));
    }

    public function scopeInactive($query){
        return $query->where('voucher_status', config('app.inactive'));
    }

    public function scopeNotDelete($query){
        return $query->where('voucher_status', '!=', 0);
    }

    public function voucherProducts(){
        return $this->hasMany(VoucherProduct::class, 'voucher_id');
    }

    public function attachment(){
        return $this->hasOne(Attachment::class, 'attachment_id', 'attachment_id');
    }
}
