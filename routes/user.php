<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'User'], function()
{
    Route::get('/', function() {
        return redirect('/home');
    });
    Route::get('home','HomeController@index')->name('home.index');
    Route::get('product/{id}','ProductController@index');
    Route::post('/postComment','ProductController@postComment')->name('post-comment');
    Route::post('/postFeedback','ProductController@postFeedback')->name('post-feedback');
    Route::post('/postRating','ProductController@postRating');
    Route::resource('user','UserController')->except('update');
    Route::put('/user/{id}/edit/profile','UserController@updateProfile')->name('user.profile');
    Route::put('/user/{id}/edit/password','UserController@updatePassword')->name('user.password');
    Route::resource('carts', 'CartController');
    Route::get('/check-out', 'CartController@getCheckOutCart')->name('user.cart.checkout');
    Route::post('/store-order', 'CartController@storeOrder')->name('user.order.store'); 
    Route::get('/thankyou', 'ThankYouController@index')->name('user.thankyou');
    Route::get('/delete--all-cart', 'CartController@getDeleteAllCart')->name('user.delete_all_cart.get');
    Route::get('/user-order','UserController@getAllOrder')->name('user.my_order');
    Route::post('/search','HomeController@search');
    Route::post('update-to-cart','CartController@updateCart');

    Route::get('category/{id}','FilterProductController@filterByCategory');
    Route::get('manufacturer/{id}','FilterProductController@filterByManufacturer');
});

Route::group(['namespace' => 'User\Auth'], function()
{
    Route::get('/login','LoginController@getLogin')->name('user.login');
    Route::post('/login','LoginController@postLogin');

    Route::get('/register','RegisterController@getRegister')->name('user.register');
    Route::post('/register','RegisterController@postRegister');

    Route::get('/logout','LogoutController@index')->name('user.logout');
});