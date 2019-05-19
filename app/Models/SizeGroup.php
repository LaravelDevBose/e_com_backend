<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizeGroup extends Model
{
    protected $table = 'size_groups';

    protected $primaryKey = 'size_group_id';

    protected $fillable = [
        'size_group_title',
        'size_group_slug',
        'size_group_status'
    ];

    public function scopeIsActive($query){
        return $query->where('size_group_status', config('app.active'));
    }

    public function scopeInactive($query){
        return $query->where('size_group_status', config('app.inactive'));
    }

    public function scopeNotDelete($query){
        return $query->where('size_group_status','!=', config('app.delete'));
    }

    public function category(){
        return $this->hasMany(SizeGroupCategory::class, 'size_group_id', 'size_group_id');
    }
}
