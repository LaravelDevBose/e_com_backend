<?php

namespace App\Providers;

use App\Models\GroupProduct;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Traits\CommonData;


class AppServiceProvider extends ServiceProvider
{
    use CommonData;

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        if (!session()->has('lang')) {
            session()->put('lang', config('app.locale'));
        }

        View::composer('templates.'.config('app.default_template').'.*', function ($v) {
            $categoryTree = CommonData::category_tree_list();
            /*$headerPageMenus = CommonData::pages_menu_list(Page::MENU_SHOW_IN['Footer']);
            $pageMenus = CommonData::pages_menu_list(Page::MENU_SHOW_IN['Header']);*/
            $footerPageMenus = $pages= Page::isActive()->notShowIn(Page::MENU_SHOW_IN['Header'])
                ->select('page_id','menu_title','page_slug','show_in','page_status')
                ->orderBy('menu_position', 'asc');

            $tcPageMenus = $footerPageMenus->where('page_cat', Page::PageCategory['Terms & Conditions'])->get();
            $ppPageMenus = $footerPageMenus->where('page_cat', Page::PageCategory['Privacy & Policy'])->get();
            $csPageMenus = $footerPageMenus->where('page_cat', Page::PageCategory['Customer Service'])->get();
            $aboutUs = Page::isActive()->where('page_slug', 'about_us')->select('body_content')->first();

            $brands = CommonData::brand_list();
            $contactUs = CommonData::setting_data();
            $catList = CommonData::category_list();
            $v->with('categoryTree', $categoryTree)
//                ->with('pageMenus', $pageMenus)
                ->with('brands', $brands)
                ->with('contactUs', $contactUs)
                ->with('catList', $catList)
                ->with('aboutUs', $aboutUs)
//                ->with('headerPageMenus', $headerPageMenus);
                ->with('tcPageMenus', $tcPageMenus)
                ->with('ppPageMenus', $ppPageMenus)
                ->with('csPageMenus', $csPageMenus);
        });

        View::composer('templates.kuteshop_v2.buyer.partials.right_side', function ($v) {
            $hotProducts = GroupProduct::where('group_type', GroupProduct::Groups['Hot Deal'])
                ->with(['product'=>function($query){
                    return $query->with('brand', 'category', 'singleVariation', 'thumbImage');
                }])->orderBy('position', 'asc')->latest()->get();
            $v->with('hotProducts', $hotProducts);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
