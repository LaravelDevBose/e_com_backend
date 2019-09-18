<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingInfo extends Model
{
    protected $table = 'billing_infos';

    protected $primaryKey = 'billing_id';

    protected $fillable = [
        'order_id',
        'buyer_id',
        'address_id',
        'first_name',
        'last_name',
        'phone_no',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }

    public function addressBook(){
        return $this->belongsTo(AddressBook::class, 'address_id', 'address_id');
    }
}
