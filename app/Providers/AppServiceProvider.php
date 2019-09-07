<?php

namespace App\Providers;

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
        View::composer('layouts.frontend.includes.navigation', function($v){
            $categoryTree = CommonData::category_tree_list();
            $v->with('categoryTree',$categoryTree);
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
