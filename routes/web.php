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

Route::get('/', function () {
    return view('customer.home');
});

Route::get('/search', function () {
    return view('customer.property.search');
});

Route::get('/detail', function () {
    return view('customer.property.detail');
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', 'Auth\LoginController@view');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/register', 'Auth\RegisterController@view');
    Route::post('/register', 'Auth\RegisterController@register');
});

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['admin']], function(){
    });

    Route::group(['middleware' => ['owner']], function(){
        Route::group(['prefix' => 'property'], function() {
            Route::get('/manage', 'PropertyController@managePage');
            Route::get('/insert', 'PropertyController@insertPropertyPage');
            Route::post('/insert', 'PropertyController@insertProperty');
        });
    });

    Route::group(['middleware' => ['customer']], function(){
    });

    Route::get('/logout', 'Auth\LoginController@logout');
});
