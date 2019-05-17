<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherProduct extends Model
{
    protected $table = 'voucher_products';

    protected $fillable = [
        'voucher_id',
        'product_id',
        'status',
    ];

    public function scopeIsActive($query){
        return $query->where('status', config('app.active'));
    }

    public function voucher(){
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function product(){
        #TODO PRODUCT RELATION
        return true;
    }
}
