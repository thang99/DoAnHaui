<?php

use Illuminate\Support\Facades\Route;

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

// Controllers Within The "App\Http\Controllers\Admin" Namespace
Route::get('/admin',function(){
    return view('admin.layouts.app');
});

Route::group(['namespace' => 'Admin','middleware' => 'checkLogin'], function()
{
    Route::prefix('admin')->group(function () {
        Route::redirect('/', '/login');
        Route::get('dashboard','DashboardController@index')->name('dashboard.index');
        Route::resource('product', 'ProductController');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::resource('users', 'UserController')->except('update');
        Route::resource('slide', 'SlideController');
        Route::resource('category', 'CategoryController');
        Route::resource('comment', 'CommentController');
        Route::resource('feedback', 'FeedbackController');
        Route::resource('order', 'OrderController');
        Route::resource('category_product', 'CategoryProductController');
        Route::get('order-detail/{order_id}', 'OrderDetailController@getDetailByOrder')->name('admin.orderdetail');
        //change status
        Route::post('/change-status','CommentController@changeStatus');
        Route::post('/change-status-feedback','FeedbackController@changeStatus');
        Route::post('/change-status-order','OrderController@changeStatus');
        //search
        Route::get('search/product','ProductController@search')->name('search_product');
        Route::get('search/user','UserController@search')->name('search_user');
        Route::get('search/slide','SlideController@search')->name('search_slide');
        Route::get('search/manufacturer','ManufacturerController@search')->name('search_manufacturer');
        Route::get('search/category','CategoryController@search')->name('search_category');
        Route::get('search/comment','CommentController@search')->name('search_comment');
        Route::get('search/category_product','CategoryProductController@search')->name('search_category_product');
        // change profile & password
        Route::put('users/{id}/edit/profile','UserController@updateProfile')->name('users.profile');
        Route::put('users/{id}/edit/password','UserController@updatePassword')->name('users.password');
    });
});

Route::group(['namespace' => 'Admin\Auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'LoginController@getLogin');
        Route::post('/login', 'LoginController@postLogin')->name('admin.login');
        Route::get('/logout', 'LogoutController@index')->name('admin.logout');
    });
});

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');