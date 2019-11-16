<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $primaryKey = 'size_id';

    protected $fillable = [
        'size_group_id',
        'size_name',
        'size_status',
    ];

    public function scopeIsActive($query){
        return $query->where('size_status', config('app.active'));
    }

    public function sizeGroup(){
        return $this->belongsTo(SizeGroup::class, 'size_group_id', 'size_group_id');
    }

    public function scopeBySearch($query, $request){
        return $query;
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'size_id', 'size_id');
    }
}
