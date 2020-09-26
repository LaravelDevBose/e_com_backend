<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table = 'product_tags';
    protected $primaryKey = 'pro_tag_id';

    protected $fillable=[
        'product_id',
        'tag_id',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'tag_id')->where('tag_status', config('app.active'));
    }
}
