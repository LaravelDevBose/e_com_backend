<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    const Payment_Method =[
        'Cash On Delivery'  =>1,
        'Credit Cart'       =>2,
        'Paypal'            =>3,
    ];

    protected $table = 'payment_infos';

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'order_id',
        'buyer_id',
        'total_price',
        'invoice_no',
        'paid_by',
        'payment_track_id',
        'paid_at',
        'payment_status',
    ];


    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }

}
