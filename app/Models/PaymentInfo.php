<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    const Payment_Method =[
        'Cash On Delivery'  =>1,
        'Salaam'            =>2,
        'eDahab'            =>3,
    ];

    const setting_key = [
        1=>'cash_on_delivery',
        2=>'card_payment',
        3=>'paypal_payment',
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

    public function getPaidByAttribute(){
        $methods = array_flip(Self::Payment_Method);
        return $methods[$this->attributes['paid_by']];
    }

    public function getPaidAtAttribute(){
        return Carbon::parse($this->attributes['paid_at'])->format('d M Y h:i A');
    }

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }

}
