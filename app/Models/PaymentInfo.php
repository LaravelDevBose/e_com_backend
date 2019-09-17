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

}
