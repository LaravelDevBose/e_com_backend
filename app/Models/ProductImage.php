<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
     protected $table = 'product_images';

     protected $primaryKey = 'image_id';

     protected $fillable =[
         'product_id',
         'pri_id',
         'model',
         'attachment_id',
         'image_status'
     ];

     public function scopeIsActive($query){
         return $query->where('image_status', config('app.active'));
     }

     public function attachment(){
         return $this->belongsTo(Attachment::class, 'attachment_id', 'attachment_id');
     }
}
