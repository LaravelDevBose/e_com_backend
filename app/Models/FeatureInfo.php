<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FeatureInfo extends Model
{
    const TYPE=[
        'Top Deals'=>1,
        'Hot Deals'=>2
    ];

    protected $table = 'feature_infos';

    protected $primaryKey = 'feature_id';

    protected $fillable = [
        'feature_title',
        'lang_title',
        'feature_slug',
        'feature_position',
        'feature_type',
        'banner_id',
        'expired_at',
        'publish_at',
        'feature_status',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('feature_status', config('app.active'));
    }

    public function scopeNotDelete($query){
        return $query->where('feature_status', '!=', config('app.delete'));
    }

    public function scopeIsLiveNow($query){
        return $query->whereDate('publish_at', '>=', Carbon::now())->whereDate('expired_at', '<', Carbon::now());
    }

    public function featuredProducts(){
        return $this->hasMany(FeaturedProduct::class, 'feature_id', 'feature_id')->where('status', config('app.active'));
    }

    public function banner(){
        return $this->hasOne(Attachment::class, 'attachment_id', 'banner_id');
    }
}
