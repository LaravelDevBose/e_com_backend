<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    const attachmentModels = [

        'category'=>1,
        'product'=>2,
        'user'=>3,
        'brand'=>4,
        'slider'=>5,
        'page'=>6,
        'setting'=>7,
        'thumbnail'=>8,
        'shop'=>9,
        'review'=>10,
    ];

    protected $table = 'attachments';
    protected $primaryKey = 'attachment_id';

    protected $fillable = [
        'attachment_no',
        'reference_id',
        'reference',
        'file_name',
        'folder',
        'file_type',
        'file_size',
        'original_name',
        'modal',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    protected $appends = array('image_path');

    function scopeByReference($query, $model)
    {
        return $query->where('model', self::attachmentModels[$model]);

    }

    public function getImagePathAttribute(){
        return $path = asset('storage/attachments/'.$this->attributes['folder'] .'/'. $this->attributes['file_name']);
    }

    public function getApiImagePathAttribute(){
        $path = storage_path('app/public/attachments/'.$this->attributes['folder'] .'/'. $this->attributes['file_name']);
        if(file_exists($path)){
            return $path;
        }

        return false;

    }

    public function category(){
        return $this->belongsTo(Category::class, 'attachment_id','banner_id');
    }
    public function sectionBanner(){
        return $this->belongsTo(Category::class, 'attachment_id','sect_banner_id');
    }

    public function categoryIcon(){
        return $this->belongsTo(Category::class, 'attachment_id','icon_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'attachment_id','attachment_id');
    }

    public function product_image(){
        return $this->hasOne(ProductImage::class, 'attachment_id','attachment_id');
    }

    public function slider(){
        return $this->belongsTo(Slider::class, 'attachment_id','attachment_id');
    }

    public function page(){
        return $this->belongsTo(Page::class, 'attachment_id','attachment_id');
    }

    public function productThumb(){
        return $this->hasOne(Product::class, 'thumb_id', 'attachment_id');
    }
}
