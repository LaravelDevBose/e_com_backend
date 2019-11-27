<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    const LEVEL =[
        1=>'First Level',
        2=>'Second Level',
        3=>'Third Level',
    ];

    const InHeader = 1;
    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'category_slug',
        'parent_id',
        'banner_id',
        'category_status',
        'is_show',
        'trans_category_name',
        'sect_banner_id',
        'icon_id'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'category_slug';
    }

    public function getCategoryNameAttribute()
    {
        if(app()->getLocale() == 'so'){
            if(!empty($this->attributes['trans_category_name'])){
                return ucfirst($this->attributes['trans_category_name']);
            }
            return ucfirst($this->attributes['category_name']);
        }else{
            return ucfirst($this->attributes['category_name']);
        }
    }

    public static function All_children_Ids($catId)
    {

        $catIdArray = [$catId];
        $sedChildID = self::where('parent_id', $catId)->where('category_status', config('app.active'))->pluck('category_id')->toArray();
        if(!empty($sedChildID)){
            $catIdArray = array_merge($catIdArray, $sedChildID);
            $thirdChildID = self::whereIn('parent_id', $sedChildID)->where('category_status', config('app.active'))->pluck('category_id')->toArray();
            if(!empty($thirdChildID)){
                $catIdArray = array_merge($catIdArray, $thirdChildID);
            }
        }
        return $catIdArray;
    }
    public static function All_children_Ids_by_array_data($catIds)
    {
        $sedChildID = self::whereIn('parent_id', $catIds)->pluck('category_id')->toArray();
        if(!empty($sedChildID)){
            $catIds = array_merge($catIds, $sedChildID);
            $thirdChildID = self::whereIn('parent_id', $sedChildID)->where('category_status', config('app.active'))->pluck('category_id')->toArray();
            if(!empty($thirdChildID)){
                $catIds = array_merge($catIds, $thirdChildID);
            }
        }
        return $catIds;
    }

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
        return $this->hasOne(Attachment::class,'attachment_id', 'banner_id');
    }

    public function sectionBanner(){
        return $this->hasOne(Attachment::class,'attachment_id', 'sect_banner_id');
    }

    public function iconImage(){
        return $this->hasOne(Attachment::class,'attachment_id', 'icon_id');
    }

    public function sizeGroup(){
        return $this->hasMany(SizeGroupCategory::class, 'category_id', 'category_id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }

    public function sectionCategories()
    {
        return $this->hasMany(SectionCategory::class, 'category_id', 'category_id');
    }
    public function sectionProducts()
    {
        return $this->hasMany(SectionProduct::class, 'category_id', 'category_id');
    }

}
