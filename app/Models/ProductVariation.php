<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    const VARIATION_MODEL = [
        'color'=>1,
        'size'=>2
    ];

    protected $table = 'product_variations';
    protected $primaryKey = 'variation_id';

    protected $fillable =[
        'product_id',
        'pri_id',
        'pri_model',
        'sec_id',
        'sec_model',
        'quantity',
        'price',
        'variation_status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    /*public function primaryModel(){
        switch ($this->attributes['pri_model']){
            case Self::VARIATION_MODEL['color']:
                $relation = $this->belongsTo(Color::class, 'sec_id', 'color_id');
                break;
            default:
                $relation = $this->belongsTo(Size::class, 'pri_id', 'size_id');
                break;
        }
        return $relation;
    }

    public function secondaryModel(){
        switch ($this->attributes['sec_model']){
            case Self::VARIATION_MODEL['size']:
                $relation = $this->belongsTo(Size::class, 'pri_id', 'size_id');
                break;
            default:
                $relation = $this->belongsTo(Color::class, 'sec_id', 'color_id');
                break;
        }
        return $relation;
    }
    */
    public function primaryModel(){
        return $this->belongsTo(Color::class, 'pri_id', 'color_id');
    }

    public function secondaryModel(){
        return $this->belongsTo(Size::class, 'sec_id', 'size_id');
    }

    public function giftProduct(){
        return $this->hasOne(Product::class, 'product_id', 'gift_product_id');
    }

}
