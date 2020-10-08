<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('index');


Route::namespace('Frontend')->prefix('front')->group(function () {
    Route::get('/get-categories', 'FrontendController@category_list');
    Route::get('/get-brands', 'FrontendController@brand_list');
    Route::get('/get-sliders', 'FrontendController@slider_list');
    Route::get('/get-discount/products', 'FrontendController@discount_products_list');
    Route::get('/get-new-arrival/products', 'FrontendController@new_arrival_products');
    Route::get('/get-trending/products', 'FrontendController@trending_products');
    Route::get('/get-recommended/products', 'FrontendController@recommended_products');
    Route::post('/get-sidebar-data', 'FrontendController@get_sidebar_data');
    Route::post('/products-list', 'FrontendController@products_list');
    Route::get('/get-product/{product_slug}', 'FrontendController@get_product_details');
});


Route::post('/subscribe', 'NewsLetterController@store');

Route::post('/attachment/store', 'AttachmentController@store')->name('attachment.store');
Route::post('/crop_image/store', 'AttachmentController@crop_image_store')->name('crop_image.store');
Route::delete('/attachment/delete/{id}', 'AttachmentController@delete')->name('attachment.delete');
Route::get('/attachment/image/{id}', 'AttachmentController@attachment_image');

/*
 * Social Provider Login Route
*/
Route::get('social/login/{provider}', 'SocialLoginController@redirectToProvider')->name('social-login');
Route::get('social/login/{provider}/callback', 'SocialLoginController@handleProviderCallback');
Route::get('/vue/social/login/{provider}', 'SocialLoginController@handleProviderCallback');

Route::get('/{any}', 'HomeController@index')->where('any', '.*');
