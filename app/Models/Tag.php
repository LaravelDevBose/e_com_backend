<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $primaryKey = 'tag_id';

    protected $fillable = [
        'tag_title',
        'tag_slug',
        'tag_status',
    ];

    public function scopeIsActive($query){
        return $query->where('tag_status', config('app.active'));
    }

    public function scopeNotDelete($query){
        return $query->where('tag_status','!=', config('app.delete'));
    }

    public function scopeBySearch($query, $request){
        return $query;
    }
}
