<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
    const Groups=[
        'Top Product'=>1,
        'Hot Product'=>2,
    ];
    const Status =[
        'Active'=>1,
        'Inactive'=>2,
        'Live'=>3,
        'Expired'=>4
    ];

    protected $table = 'group_products';

    protected $primaryKey = 'group_id';

    protected $fillable = [
        'group_type',
        'product_id',
        'expired_at',
        'position',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = [
        'group_title',
    ];

    public function getGroupTitleAttribute()
    {
        $types = Self::groupsFlip();
        return $types[$this->attributes['group_type']];
    }

    public function scopeIsActive($query){
        return $query->where('status', Self::Status['Active']);
    }

    public function scopeNotDelete($query){
        return $query->where('status', '!=', config('app.delete'));
    }

    public function scopeIsLive($query){
        return $query->where('expired_at', '>=', Carbon::today());
    }

    public function scopeIsExpired($query){
        return $query->where('expired_at', '<', Carbon::today());
    }

    public static function groupsFlip()
    {
        return array_flip(Self::Groups);
    }

    public static function groupsSelect()
    {
        $type = [];
        foreach (Self::groupsFlip() as $key=> $value){
            array_push($type, [
                'id'=>$key,
                'text'=>$value
            ]);
        }
        return $type;
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
