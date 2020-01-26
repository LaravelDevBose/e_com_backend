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
            return $query->isActive()->with(['children'=>function($q){
                return $q->isActive();
            }]);
        }])->get();

        if(!empty($categories)){
            return $categories;
        }else{
            return [];
        }
    }

    public static function category_tree($request=null){
        $categories = Category::isActive()->isParent()->with(['children'=>function($query){
            return $query->isActive()->with(['children'=>function($q){
                return $q->isActive();
            }]);
        }])->get();

        if(!empty($categories)){
            return $categories;
        }else{
            return [];
        }
    }

    public static function category_list($request=null){
        $categories = Category::isActive()->select('category_slug', 'category_name')->bySearch($request)->groupBy('category_id','parent_id')->orderBy('category_id', 'asc')->get();
        if(!empty($categories)){
            return $categories;
        }else{
            return [];
        }
    }

    public static function brand_list($request= null){
        $request = (object)$request;

        $brands = Brand::isActive()->with('attachment')->searchBy($request);

        if(!empty($request->brandIds)){
            $brands = $brands->whereIn('brand_id', $request->brandIds);
        }
        if(!empty($brands)){
            $brands = $brands->get();
            return  $brands;
        }else{
            return [];
        }
    }

    public static function color_list($request=null){
        $request = (object)$request;

        $colors = Color::isActive()->bySearch($request);

        if(!empty($request->colorIds)){
            $colors = $colors->whereIn('color_id', $request->colorIds);
        }
        if(!empty($colors)){
            $colors = $colors->get();
            return $colors;
        }{
            return [];
        }
    }

    public static function size_list($request=null){
        $request = (object)$request;
        $sizes = Size::isActive()->bySearch($request);
        if(!empty($request->category_id)){
            $sizeGroupIds = SizeGroupCategory::where('category_id', $request->category_id)->pluck('size_group_id');
            $sizes = $sizes->whereIn('size_group_id', $sizeGroupIds);
        }

        if(!empty($request->categoryIds)){
            $sizeGroupIds = SizeGroupCategory::whereIn('category_id', $request->categoryIds)->pluck('size_group_id');
            $sizes = $sizes->whereIn('size_group_id', $sizeGroupIds);
        }

        if(!empty($request->sizeIds)){
            $sizes = $sizes->whereIn('size_id', $request->sizeIds);
        }

        if(!empty($sizes)){
            $sizes = $sizes->get();
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
                        $image = Attachment::find($setting->value);
                        if(!empty($image)){
                            $logo_image = $image->image_path;
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

    public static function slider_list($types){
        $sliders = Slider::isActive()->whereIn('slider_type', $types)->orderBy('slider_position', 'asc')->with('attachment')->get();
        if(!empty($sliders)){
            return $sliders;
        }else{
            return [];
        }
    }

    public static function pages_menu_list($notShowIn=null){
        $pages= Page::isActive()
            ->select('page_id','menu_title','page_slug','show_in','page_status')
            ->orderBy('menu_position', 'asc');

            if(!empty($notShowIn)){
                $pages = $pages->notShowIn($notShowIn);
            }

            $pages = $pages->get();

        if(!empty($pages)){
            return $pages;
        }else{
            return [];
        }
    }
}
