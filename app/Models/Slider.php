<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
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
        'trans_slider_title',
        'trans_sub_title',
        'trans_btn_text',
    ];

    public function getSliderTitleAttribute()
    {
        if(app()->getLocale() == 'so'){
            if(!empty($this->attributes['trans_slider_title'])){
                return ucfirst($this->attributes['trans_slider_title']);
            }
            return ucfirst($this->attributes['slider_title']);

        }else{
            return ucfirst($this->attributes['slider_title']);
        }
    }
    public function getSubTitleAttribute()
    {
        if(app()->getLocale() == 'so'){
            if(!empty($this->attributes['trans_sub_title'])){
                return ucfirst($this->attributes['trans_sub_title']);
            }
            return ucfirst($this->attributes['sub_title']);
        }else{
            return ucfirst($this->attributes['sub_title']);
        }
    }
    public function getBtnTextAttribute()
    {
        if(app()->getLocale() == 'so'){
            if (!empty($this->attributes['trans_btn_text'])){
                return ucfirst($this->attributes['trans_btn_text']);
            }
            return ucfirst($this->attributes['btn_text']);
        }else{
            return ucfirst($this->attributes['btn_text']);
        }
    }

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
