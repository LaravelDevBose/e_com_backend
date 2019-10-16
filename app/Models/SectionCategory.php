<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionCategory extends Model
{
    protected $table = 'section_categories';

    protected $primaryKey = 'sec_cat_id';

    protected $fillable = [
        'section_id',
        'category_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function section()
    {
        return $this->belongsTo(HomepageSection::class, 'section_id', 'section_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function secCatProducts(){
        return $this->hasMany(SectionProduct::class, 'sec_cat_id', 'sec_cat_id');
    }
}
