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
    ];

    public function attachment(){
        return $this->hasOne(Attachment::class,'attachment_id', 'attachment_id')->where('folder', 'slider');
    }
}
