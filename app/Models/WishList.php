<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'wish_lists';

    protected $primaryKey ='wish_list_id';

    protected $fillable = [
        'buyer_id',
        'product_id',
        'status',
    ];

    public function scopeIsActive($query){
        return $query->where('status', config('app.active'));
    }

    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
