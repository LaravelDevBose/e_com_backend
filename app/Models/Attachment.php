<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    const attachmentModels = [

        'category' => 1,
        'product' => 2,
        'user' => 3,
        'voucher' => 4,
        'campaign'=>5,
        'brand'=>6,
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

    function scopeByReference($query, $model)
    {
        return $query->where('model', self::attachmentModels[$model]);

    }

    public function getImagePathAttribute(){
        $path = storage_path('app/public/attachments/'.$this->attributes['folder'] .'/'. $this->attributes['file_name']);
        if(file_exists($path)){
            //        $path = storage_path('app/public/default/d_addons.png');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            return $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }

        return false;

    }

    public function category(){
        return $this->belongsTo(Category::class, 'attachment_id','attachment_id');
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

    public function product_image(){
        return $this->hasOne(ProductImage::class, 'attachment_id','attachment_id');
    }
}
