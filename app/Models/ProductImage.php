<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
     protected $table = 'product_images';

     protected $primaryKey = 'image_id';

     protected $fillable =[
         'product_id',
         'variation_id',
         'attachment_id',
         'image_status'
     ];
}
