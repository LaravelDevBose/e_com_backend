<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Buyer extends User
{
    protected $table = 'buyers';
    protected $primaryKey = 'buyer_id';

    protected $fillable = [
        'user_id',
        'avatar_id',
        'buyer_address',
        'buyer_status',
    ];

    public function wishList(){
        return $this->hasMany(WishList::class, 'buyer_id', 'buyer_id');
    }

    public function addressBooks(){
        return $this->hasMany(AddressBook::class, 'buyer_id', 'buyer_id');
    }
}
