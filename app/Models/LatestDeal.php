<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatestDeal extends Model
{
    protected $table = 'latest_deals';

    protected $primaryKey= 'latest_deal_id';

    protected $fillable = [
        'start_time',
        'end_time',
        'status',
    ];

    public function deal_products()
    {
        return $this->hasMany(LatestDealProduct::class, 'latest_deal_id', 'latest_deal_id')->where('status', config('app.active'));
    }
}
