<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionProduct extends Model
{
    protected $table = 'section_products';

    protected $primaryKey = 'sec_pro_id';

    protected $fillable = [
        'section_id',
        'sec_cat_id',
        'category_id',
        'product_id',
        'product_position',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('status', config('app.active'));
    }
    public function section()
    {
        return $this->belongsTo(HomepageSection::class, 'section_id', 'section_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function secProCategory()
    {
        return $this->belongsTo(SectionCategory::class, 'sec_cat_id', 'sec_cat_id');
    }
}
