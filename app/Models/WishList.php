<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'wish_lists';

    protected $primaryKey ='wish_list_id';

    protected $fillable = [
        'user_id',
        'product_id',
        'status',
    ];

    public function scopeIsActive($query){
        return $query->where('status', config('app.active'));
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
