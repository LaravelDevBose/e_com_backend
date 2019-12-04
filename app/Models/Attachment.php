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
        'voucher'=>4,
        'campaign'=>5,
        'brand'=>6,
        'slider'=>7,
        'page'=>8,
        'setting'=>9,
        'thumbnail'=>10,
        'shop'=>11,
        'section'=>12,
        'Review'=>13,
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
        'original_name'
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

    public function voucher(){
        return $this->belongsTo(Voucher::class, 'attachment_id','attachment_id');
    }

    public function campaign(){
        return $this->belongsTo(Campaign::class, 'attachment_id','attachment_id');
    }

    public function campaignAdds(){
        return $this->belongsTo(Campaign::class, 'attachment_id','adds_attachment_id');
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

    public function homepageSection()
    {
        return $this->hasOne(HomepageSection::class, 'attachment_id', 'attachment_id');
    }
}
