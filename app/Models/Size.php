<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $primaryKey = 'size_id';

    protected $fillable = [
        'size_name',
        'size_status',
    ];
}
