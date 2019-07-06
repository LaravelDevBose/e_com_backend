<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkinType extends Model
{
    protected $table ='skin_types';

    protected $primaryKey ='skin_type_id';

    protected $fillable = [
        'skin_type',
        'skin_type_status',
    ];

    public function scopeIsActive($query){
        return $query->where('skin_type_status', config('app.active'));
    }

    public function scopeNotDelete($query){
        return $query->where('skin_type_status', '!=', config('app.delete'));
    }
}
