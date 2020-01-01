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
            $headerPageMenus = CommonData::pages_menu_list(Page::MENU_SHOW_IN['Footer']);
            dd($headerPageMenus);
            $pageMenus = CommonData::pages_menu_list(Page::MENU_SHOW_IN['Header']);
            $brands = CommonData::brand_list();
            $contactUs = CommonData::setting_data();
            $catList = CommonData::category_list();
            $v->with('categoryTree', $categoryTree)
                ->with('pageMenus', $pageMenus)
                ->with('brands', $brands)
                ->with('contactUs', $contactUs)
                ->with('catList', $catList)
                ->with('headerPageMenus', $headerPageMenus);
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
