<?php

namespace App;

use App\Models\Order;
use App\Models\SocialProvider;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    const UserStatus = [
        0=>'Delete',
        1=>'Active',
        2=>'Block',
        3=>'Un-Verified'
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
        'email',
        'phone_no',
        'address',
        'avatar_id',
        'password',
        'status',
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

    public function social_provider()
    {
        return $this->hasOne(SocialProvider::class, 'user_id', 'user_id');
    }

    public function scopeNotDelete($query)
    {
        return $query->where('status', '!=', config('app.delete'));
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'user_id');
    }
}
