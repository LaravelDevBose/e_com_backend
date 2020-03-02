<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/invoice', function (){
    return view('mail.v1.invoice.invoice_mail');
});

Auth::routes(['verify' => true]);

Route::namespace('Frontend')->as('front.')->group(function () {
    Route::get('/set/language/{lang}','FrontendController@set_lang')->name('set.lang');


    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('category/{category_slug}/products', 'FrontendController@category_wish_products')->name('category.product');
    Route::get('product/{product_slug}', 'FrontendController@product_details')->name('product');
    Route::get('cart', 'FrontendController@cart_page')->name('cart');
    Route::get('contact', 'FrontendController@contact_pages')->name('contact');
    Route::get('pages/{slug}', 'FrontendController@general_pages')->name('pages');

    Route::post('/product/sidebar/data', 'FrontendController@product_sidebar_data');
    Route::post('/shorting/products', 'FrontendController@sorting_product');
    Route::get('section/list', 'FrontendController@section_data_list')->name('section.list');
    Route::get('get/section/{section_id}/products', 'FrontendController@get_section_products')->name('section.products');
    Route::get('/product/variations/data', 'FrontendController@product_variation_data');
    Route::post('/search', 'FrontendController@searching_data')->name('search');
    Route::get('/all/category/list', 'FrontendController@get_category_list')->name('category.list');
    Route::get('/get/hot/products', 'FrontendController@hot_products');
    Route::get('/shop/{shop_slug}', 'FrontendController@shop_profile')->name('shop.profile');
    Route::get('/mall', 'FrontendController@mall_products')->name('mall');
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

Route::prefix('error')->as('error.')->group(function (){
    Route::get('/404', 'ErrorController@error_404')->name('404');
});

