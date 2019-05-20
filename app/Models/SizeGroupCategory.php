<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizeGroupCategory extends Model
{
    protected $table = 'size_group_categories';

    protected $fillable =[
        'size_group_id',
        'category_id',
        'sgc_status',
    ];


    public function sizeGroup(){
        return $this->belongsTo(SizeGroup::class, 'size_group_id', 'size_group_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
