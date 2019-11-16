<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        info(session()->get('lang','ddd'));
        if (session()->has('lang')) {
            $locale = session()->get('lang', config('app.locale'));
        } else {
            $locale = config('app.locale');
        }

        App::setLocale($locale);
        return $next($request);
    }
}
