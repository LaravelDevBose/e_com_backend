<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignProduct extends Model
{

    protected $table = 'campaign_products';

    protected $primaryKey = 'cam_pro_id';

    protected $fillable = [
        'campaign_id',
        'product_id',
        'discount_price',
        'discount_type',
        'campaign_qty',
        'cam_pro_status',
    ];

    public function scopeIsActive($query){
        return $query->where('cam_pro_status', config('app.active'));
    }

    public function campaign(){
        return $this->belongsTo(Campaign::class, 'campaign_id', 'campaign_id');
    }

    public function product(){
        //belongTo
    }
}
