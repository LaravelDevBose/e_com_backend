<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    protected $primaryKey = 'color_id';

    protected $fillable = [
        'color_name',
        'color_code',
        'color_status',
    ];

    public function scopeIsActive($query){
        return $query->where('color_status', config('app.active'));
    }

    public function scopeNotDelete($query){
        return $query->whereNotIn('color_status', [0]);
    }
}
