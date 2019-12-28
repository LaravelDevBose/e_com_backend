<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    const Status = [
        'Active'=>1,
        'Inactive'=>2,
        'Requested'=>3
    ];

    protected $table = 'brands';

    protected $primaryKey = 'brand_id';

    protected $fillable = [
        'brand_name',
        'brand_slug',
        'attachment_id',
        'brand_status',
        'trans_brand_name'
    ];

    public function getBrandNameAttributes(){
        if(app()->getLocale() == 'so'){
            if(!empty($this->attributes['trans_brand_name'])){
                return ucfirst($this->attributes['trans_brand_name']);
            }
            return ucfirst($this->attributes['brand_name']);
        }else{
            return ucfirst($this->attributes['brand_name']);
        }

    }

    public function scopeNotDelete($query){
        return $query->where('brand_status', '!=', config('app.delete'));
    }

    public function scopeIsActive($query){
        return $query->where('brand_status', config('app.active'));
    }

    public function scopeSearchBy($query, $request){
        if(!empty($request)){
            if(!empty($request->brand_name)){
                $query->where('brand_name', 'like', '%'.$request->brand_name.'%');
            }
        }

        return $query;
    }

    public function attachment(){
        return $this->hasOne(Attachment::class,'attachment_id', 'attachment_id')->where('folder', 'brand');
    }

    public function product(){
        return $this->hasMany(Product::class, 'brand_id', 'brand_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'brand_id', 'brand_id');
    }
}
