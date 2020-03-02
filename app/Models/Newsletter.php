<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletters';

    protected $primaryKey = 'news_letter_id';

    protected $fillable = [
        'email_address',
        'status'
    ];
}
