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

    const InHeader = 1;
    protected $table = 'categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'category_slug',
        'parent_id',
        'banner_id',
        'icon_id',
        'in_header',
        'category_status',
        'created_by',
        'updated_by',
        'deleted_by',
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
        return $query->where('category_status', '!=', config('app.delete'));
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

    public function icon(){
        return $this->hasOne(Attachment::class,'attachment_id', 'icon_id');
    }

    public function sizeGroup(){
        return $this->hasMany(SizeGroupCategory::class, 'category_id', 'category_id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }

}
