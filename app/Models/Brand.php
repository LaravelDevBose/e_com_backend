<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $primaryKey = 'brand_id';

    protected $fillable = [
        'brand_name',
        'brand_slug',
        'attachment_id',
        'brand_status'
    ];

    public function scopeNotDelete($query){
        return $query->where('brand_status', '!=', config('app.delete'));
    }

    public function scopeIsActive($query){
        return $query->where('brand_status', config('app.active'));
    }

    public function attachment(){
        return $this->hasOne(Attachment::class,'attachment_id', 'attachment_id')->where('folder', 'brand');
    }

    public function product(){
        return $this->hasMany(Product::class, 'brand_id', 'brand_id');
    }

}
