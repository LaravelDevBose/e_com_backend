<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryCost extends Model
{
    const DeliveryArea =[
        1=>'Inside Of Dhaka',
        2=>'Outside Of Dhaka'
    ];


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
        'delivery_area',
    ];

    public function scopeIsActive($query){
        return $query->where('cost_status', config('app.active'));
    }

    public function scopeNotDelete($query){
        return $query->where('cost_status', '!=', config('app.delete'));
    }
}
