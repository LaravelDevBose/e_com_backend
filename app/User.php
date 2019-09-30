<?php

namespace App;

use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const UserStatus = [
        0=>'Delete',
        1=>'Active',
        2=>'Block',
        3=>'Un-Verified'
    ];
    const AccountType=[
        'buyer'=>1,
        'seller'=>2,
        'both'=>3
    ];

    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'user_name',
        'email',
        'phone_no',
        'password',
        'status',
        'account_type',
        'is_buyer',
        'is_seller',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'status_label',
    ];

    public function getStatusLabelAttribute()
    {
        return Self::UserStatus[$this->attributes['status']];
    }
    public function seller(){
        return $this->hasOne(Seller::class, 'user_id', 'user_id');
    }

    public function buyer(){
        return $this->hasOne(Buyer::class, 'user_id', 'user_id');
    }
}
