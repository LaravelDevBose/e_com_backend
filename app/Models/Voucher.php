<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
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
