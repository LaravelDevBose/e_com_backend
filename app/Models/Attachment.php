<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    const attachmentModels = [

        'category' => 1,
        'cleaner' => 2,
        'addons' => 3,
        'service' => 4,
        'address' => 5,
        'bookingRequest' => 6,
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
}
