<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    const SliderType = [
        'Home Page'=>1,
        'Mall Page'=>2
    ];

    protected $table = 'sliders';
    protected $primaryKey = 'slider_id';

    protected $fillable = [
        'slider_title',
        'sub_title',
        'btn_text',
        'btn_url',
        'slider_position',
        'attachment_id',
        'slider_status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function attachment(){
        return $this->hasOne(Attachment::class,'attachment_id', 'attachment_id');
    }

    public function scopeIsActive($query){
        return $query->where('slider_status', config('app.active'));
    }

    public function scopeNotDelete($query){
        return $query->where('slider_status','!=', config('app.delete'));
    }

    public function scopeBySearch($query, $request){
        return $query;
    }
}
