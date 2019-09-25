<?php

namespace App\Providers;

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
        View::composer('templates.'.config('app.default_template').'.*', function ($v) {
            $categoryTree = CommonData::category_tree_list();
            $headerPageMenus = CommonData::pages_menu_list(Page::MENU_SHOW_IN['Footer']);
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
