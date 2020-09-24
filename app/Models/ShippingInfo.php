<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    const METHOD = [
        'Flat Rate'=>1,
    ];

    protected $table = 'shipping_infos';
    protected $primaryKey = 'shipping_id';

    protected $fillable = [
        'order_id',
        'user_id',
        'address_id',
        'first_name',
        'last_name',
        'phone_no',
        'address',
        'city',
        'state',
        'district',
        'region',
        'postal_code',
        'country',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [
        'full_name',
    ];

    public function getFullNameAttribute(){
        return ucfirst($this->attributes['first_name'] .' '. $this->attributes['last_name']);
    }

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function addressBook(){
        return $this->belongsTo(AddressBook::class, 'address_id', 'address_id');
    }

}
