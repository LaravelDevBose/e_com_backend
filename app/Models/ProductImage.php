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
}
