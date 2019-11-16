<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $table = 'social_providers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'provider_id',
        'provider',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
