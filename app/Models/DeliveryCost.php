<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryCost extends Model
{
    protected $table = 'delivery_costs';

    protected $primaryKey = 'cost_id';

    protected $fillable = [
        'cost_title',
        'package_weight',
        'package_length',
        'package_width',
        'package_height',
        'cost_price',
        'cost_status',
    ];

    public function scopeIsActive($query){
        return $query->where('cost_status', 1);
    }

    public function scopeNotDelete($query){
        return $query->where('cost_status', '!=', 0);
    }
}
