<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Setting;
use Carbon\Carbon;
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
