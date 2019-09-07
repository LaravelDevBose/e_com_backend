<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const LEVEL =[
        1=>'First Level',
        2=>'Second Level',
        3=>'Third Level',
    ];

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'category_slug',
        'parent_id',
        'attachment_id',
        'category_status',
    ];

    public function scopeIsParent($query){
        $query->whereNull('parent_id');
    }
    public function scopeNotThirdLevel($query){
        $query->whereNull('parent_id');
    }

    public function scopeIsActive($query){
        return $query->where('category_status', config('app.active'));
    }
    public function scopeNotDelete($query){
        return $query->where('category_status', '!=',0);
    }

    public function scopeBySearch($query, $request){
        return $query;
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id', 'category_id');
    }

    public function parent(){
        return $this->hasOne(Category::class, 'category_id', 'parent_id');
    }

    public function attachment(){
        return $this->hasOne(Attachment::class,'attachment_id', 'attachment_id');
    }

    public function sizeGroup(){
        return $this->hasMany(SizeGroupCategory::class, 'category_id', 'category_id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
