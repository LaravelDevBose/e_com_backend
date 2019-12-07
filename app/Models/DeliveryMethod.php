<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    protected $table = 'delivery_methods';

    protected $primaryKey = 'delivery_id';

    protected $fillable = [
        'delivery_title',
        'min_time',
        'max_time',
        'cost_price',
        'delivery_status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function getStatusLabelAttribute(){

    }

    public function scopeNotDelete($query)
    {
        return $query->where('delivery_status', '!=', config('app.delete'));
    }

    public function scopeIsActive($query)
    {
        return $query->where('delivery_status', config('app.active'));
    }
}
