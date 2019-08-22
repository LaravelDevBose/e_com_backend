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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/attachment/store', 'AttachmentController@store')->name('attachment.store');
Route::post('/crop_image/store', 'AttachmentController@crop_image_store')->name('crop_image.store');
Route::delete('/attachment/delete/{id}', 'AttachmentController@delete')->name('attachment.delete');
Route::get('/attachment/image/{id}', 'AttachmentController@attachment_image');
