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
    ];
}
