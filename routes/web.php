<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Route;

Route::namespace('Frontend')->as('front.')->group(function (){
    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('category/{category}/products', 'FrontendController@category_wish_products');
    Route::get('product/{product_slug}', 'FrontendController@product_details');
    Route::get('checkout', 'FrontendController@checkout');
    Route::get('cart', 'FrontendController@cart_page');
    Route::get('contact', 'FrontendController@contact_pages');
    Route::get('pages/{slug}', 'FrontendController@general_pages');
});


Route::view('seller-login', 'auth.seller_login');
Route::view('user-dashboard', 'front.user_dashboard.dashboard');
Route::view('account-information', 'front.user_dashboard.account_information');
Route::view('edit-contact-info', 'front.user_dashboard.partials.edit_contact_info');
Route::view('change-password', 'front.user_dashboard.partials.change_password');
Route::view('address-book', 'front.user_dashboard.address_book');
Route::view('my-orders', 'front.user_dashboard.my_orders');
Route::view('my-product-reviews', 'front.user_dashboard.my_product_reviews');
Route::view('my-wishlist', 'front.user_dashboard.my_wishlist');



Route::get('payment/methods', 'GeneralController@accepted_payment_methods');
Route::get('default/images', 'GeneralController@default_images');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/attachment/store', 'AttachmentController@store')->name('attachment.store');
Route::post('/crop_image/store', 'AttachmentController@crop_image_store')->name('crop_image.store');
Route::delete('/attachment/delete/{id}', 'AttachmentController@delete')->name('attachment.delete');
Route::get('/attachment/image/{id}', 'AttachmentController@attachment_image');
