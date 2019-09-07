<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{

    const DiscountType =[
        1=>'Fixed',
        2=>'Percent'
    ];

    const Status=[
        0=>'Delete',
        1=>'Active',
        2=>'Inactive',
        3=>'Live',
        4=>'Expired',
    ];


    protected $table = 'campaigns';

    protected $primaryKey =  'campaign_id';

    protected $fillable = [
        'campaign_title',
        'campaign_start',
        'campaign_end',
        'campaign_details',
        'attachment_id',
        'campaign_status',
        'camp_reg_date',
    ];


    public function scopeIsActive($query){
        return $query->where('campaign_status', 1);
    }

    public function scopeInactive($query){
        return $query->where('campaign_status', 2);
    }

    public function scopeNotDelete($query){
        return $query->where('campaign_status', '!=', 0);
    }

    public function scopeIsLive($query){
        return $query->where('campaign_status', 3);
    }

    public function scopeIsExpired($query){
        return $query->where('campaign_status', 4);
    }


    public function attachment(){
        return $this->hasOne(Attachment::class,'attachment_id', 'attachment_id');
    }

    public function campaign_products(){
        return $this->hasMany(CampaignProduct::class, 'campaign_id', 'campaign_id');
    }
}
