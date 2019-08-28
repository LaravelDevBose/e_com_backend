<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const Setting_Type =[
        'contact'=>1,
        'campaign'=>2,
    ];

    protected $table = 'settings';

    protected $primaryKey = 'id';

    protected $fillable=[
        'key',
        'value',
        'type',
    ];
}
