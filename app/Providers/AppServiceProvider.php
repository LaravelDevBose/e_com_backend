<?php

namespace App\Providers;

use App\Models\Page;
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
        View::composer(['layouts.frontend.includes.navigation', 'layouts.frontend.includes.mobileMenu'], function ($v) {
            $categoryTree = CommonData::category_tree_list();
            $headerPageMenus = CommonData::pages_menu_list(Page::MENU_SHOW_IN['Footer']);
            $v->with('categoryTree', $categoryTree)
                ->with('headerPageMenus', $headerPageMenus);
        });

        View::composer('layouts.frontend.includes.globalFooter', function ($v) {
            $pageMenus = CommonData::pages_menu_list(Page::MENU_SHOW_IN['Header']);
            $brands = CommonData::brand_list();
            $contactUs = CommonData::setting_data();
            $v->with('pageMenus', $pageMenus)
                ->with('brands', $brands)
                ->with('contactUs', $contactUs);
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
