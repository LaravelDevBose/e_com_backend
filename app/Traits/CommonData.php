<?php

namespace App\Traits;

use App\Models\Attachment;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Size;
use App\Models\SizeGroupCategory;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

trait CommonData
{
    public static function category_tree_list($request=null){
        $categories = Category::isActive()->isParent()->with(['attachment','children'=>function($query){
            return $query->isActive()->with('children');
        }])->get();

        if(!empty($categories)){
            return $categories;
        }else{
            return [];
        }
    }

    public static function category_tree($request=null){
        $categories = Category::isActive()->isParent()->with(['children'=>function($query){
            return $query->isActive()->with('children');
        }])->get();

        if(!empty($categories)){
            return $categories;
        }else{
            return [];
        }
    }

    public static function category_list($request=null){
        $categories = Category::isActive()->bySearch($request)->groupBy('category_id','parent_id')->orderBy('category_id', 'asc')->get();
        if(!empty($categories)){
            return $categories;
        }else{
            return [];
        }
    }

    public static function brand_list($request= null){
        $brands = Brand::isActive()->with('attachment')->searchBy($request)->get();

        if(!empty($brands)){
            return  $brands;
        }else{
            return [];
        }
    }

    public static function color_list($request=null){
        $colors = Color::isActive()->bySearch($request)->get();

        if(!empty($colors)){
            return $colors;
        }{
            return [];
        }
    }

    public static function size_list($request=null){
        $request = (object)$request;

        if($request->category_id){
            $sizeGroupId = SizeGroupCategory::where('category_id', $request->category_id)->pluck('size_group_id');
            $sizes = Size::whereIn('size_group_id', $sizeGroupId)->bySearch($request)->get();
        }{
            $sizes = Size::isActive()->bySearch($request)->get();
        }

        if(!empty($sizes)){
            return $sizes;
        }{
            return [];
        }
    }

    public static function tag_list($request=null){

        $tags = Tag::isActive()->bySearch($request)->get();

        if(!empty($tags)){
            return $tags;
        }{
            return [];
        }
    }

    public static function setting_data(){
        $contactSettingData= Setting::where('type', Setting::Setting_Type['contact'])->get();
        $contactSetting = array();
        $logo_image = '';

        if(!empty($contactSettingData)){
            foreach ($contactSettingData as $setting){
                if($setting->key == 'logo_image'){
                    if(!empty($setting->value) && $setting->value != ''){
                        $image = Attachment::imagePath($setting->value);
                        if(!empty($image)){
                            $logo_image = $image;
                        }
                    }else{
                        $logo_image='';
                    }
                }else{
                    $contactSetting[$setting->key] = $setting->value;
                }
            }

        }

        $data = [
            'contactSetting'=>$contactSetting,
            'logoImage'=>$logo_image,
        ];

        return $data;
    }

    public static function slider_list($request=null){
        $sliders = Slider::isActive()->orderBy('slider_position', 'asc')->with('attachment')->get();
        if(!empty($sliders)){
            return $sliders;
        }else{
            return [];
        }
    }

    public static function pages_menu_list($notShowIn){
        $pages= Page::isActive()
            ->select('menu_title','page_slug','show_in','page_status')
            ->notShowIn($notShowIn)->orderBy('menu_position', 'asc')
            ->get();

        if(!empty($pages)){
            return $pages;
        }else{
            return [];
        }
    }
}
