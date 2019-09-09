<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
    protected $table ='sellers';

    protected $primaryKey ='seller_id';

    protected $fillable=[
        'user_id',
        'shop_name',
        'shop_address',
        'shop_phone',
        'shop_email',
        'shop_status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
