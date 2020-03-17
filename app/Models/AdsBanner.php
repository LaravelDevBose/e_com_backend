<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AdsBanner extends Model
{
    const ADS_POSITIONS = [
        'Home Page Slider Right'    => 1,
        'Home Page Body First'      => 2,
        'Home Page Body Second'     => 3,
        'Home Page Body Third'      => 4,
        'Products Page Right Bar'   => 5
    ];

    protected $table = 'ads_banners';
    protected $primaryKey = 'ads_banner_id';

    protected $fillable = [
        'ads_title',
        'ads_trans_title',
        'attachment_id',
        'ads_url',
        'ads_position',
        'ads_expired',
        'ads_status',
    ];

    public function scopeIsLive($query)
    {
        return $query->whereDate('ads_expired' , '>=', Carbon::now())->where('ads_status', config('app.active'));
    }

    public function getPositionLabelAttribute()
    {
        $positions = array_flip(self::ADS_POSITIONS);
        return $positions[$this->attributes['ads_position']];
    }

    public function getStatusLabelAttribute()
    {
        if($this->attributes['ads_status'] == config('app.active')){
            return 'Active';
        }else {
            return 'Inactive';
        }
    }

    public function image()
    {
        return $this->hasOne(Attachment::class, 'attachment_id', 'attachment_id');
    }
}
