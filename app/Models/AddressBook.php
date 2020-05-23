<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    const ADDRESS_TYPE =[
        'billing'=>1,
        'shipping'=>2
    ];
    const State = [
        1=>'Awdal',
        2=>'Bakool',
        3=>'Banaadir',
        4=>'Bari',
        5=>'Baay',
        6=>'Galguduud',
        7=>'Gedo',
        8=>'Hiiraan',
        9=>'Jubbada_Dhexe',
        10=>'Jubbada_Hoose',
        11=>'Mudug',
        12=>'Nugaal',
        13=>'Sanaag',
        14=>'Shabeellaha',
        15=>'Shabeellaha_Hoose',
        16=>'Sool',
        17=>'Togdheer',
        18=>'Woqooyi_Galbeed',
    ];

    const cityList = [
        'all'=>0,
        'bosaso'=>1,
        'qardho'=>2,
        'hargeisa'=>3,
        'badhan'=>4,
        'ceerigaabo'=>5,
        'garowe'=>6,
        'muqdisho'=>7,
        'carmo'=>8,
        'burco'=>9,
        'boorama'=>10
    ];

    protected $table = 'address_books';

    protected $primaryKey = 'address_id';

    protected $fillable = [
        'buyer_id',
        'first_name',
        'last_name',
        'phone_no',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'address_type',
        'address_status',
        'district',
        'region',
    ];

    protected $appends = array('full_address');

    public function scopeIsActive($query){
        return $query->where('address_status', config('app.active'));
    }
    public function scopeMyAddress($query){
        return $query->where('buyer_id', auth()->user()->buyer->buyer_id);
    }

    public function getFullAddressAttribute(){
        $fullAddress = '';
        if(!empty($this->attributes['first_name'])){
            $fullAddress .= $this->attributes['first_name'].' ';
        }

        if(!empty($this->attributes['last_name'])){
            $fullAddress .= $this->attributes['last_name'].', ';
        }

        if(!empty($this->attributes['address'])){
            $fullAddress .= $this->attributes['address'].', ';
        }

        if(!empty($this->attributes['city'])){
            $fullAddress .= $this->attributes['city'].', ';
        }

        if(!empty($this->attributes['state'])){
            $fullAddress .= $this->attributes['state'];
        }

        if(!empty($this->attributes['postal_code'])){
            $fullAddress .= '-'.$this->attributes['postal_code'].', ';
        }

        if(!empty($this->attributes['country'])){
            $fullAddress .= $this->attributes['country'];
        }
        return $fullAddress;
    }
    public static function addressBookSelect($addressBooks){
        $address = [];
        if(!empty($addressBooks)){
            foreach ($addressBooks as $addressBook){
                array_push($address, [
                    'id'=>$addressBook->address_id,
                    'text'=>$addressBook->full_address,
                ]);
            }
        }
        return $address;
    }

    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }

    public function billingInfos(){
        return $this->hasMany(BillingInfo::class, 'address_id', 'address_id');
    }

    public function shippingInfos(){
        return $this->hasMany(ShippingInfo::class, 'address_id', 'address_id');
    }
}
