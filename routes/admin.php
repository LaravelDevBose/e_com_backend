<?php
use Illuminate\Support\Facades\Route;

Route::get('admin-panel/login', 'Auth\AdminLoginController@show_login_page')->name('admin.login');
Route::post('admin-panel/login', 'Auth\AdminLoginController@login')->name('admin.login');

Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function (){

    Route::get('home','HomeController@index')->name('home');
});

Route::prefix('api/admin')->namespace('Admin')->group(function (){

});
