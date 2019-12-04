<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $primaryKey = 'rating_id';

    protected $fillable = [
        'product_id',
        'count',
        'rating',
        'status',
    ];

    public function scopeNotDelete($query){
        return $query->where('status','!=', config('app.delete'));
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
