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

Route::get('/search', 'PropertyController@searchPage');

Route::get('/detail/{id}', 'PropertyController@detailPage')->name('propetyDetailForCustomer');
Route::get('/detail/{id}/book', 'PropertyController@bookingPage')->name('bookForCustomer');
Route::get('/book/history', 'ScheduleController@bookingHistoryPage')->name('bookingHistoryForCustomer');

Route::get('/dashboard', function () {
    return view('owner.dashboard');
});

Route::get('/send', 'NotificationController@sendSMSNotification');

Route::get('/reminder', function () {
    event(new App\Events\Reminder('Someone'));
    return "Event has been sent!";
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', 'Auth\LoginController@view');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/register', 'Auth\RegisterController@view');
    Route::post('/register', 'Auth\RegisterController@register');
});

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::group(['prefix' => 'admin'], function(){
            Route::group(['prefix' => 'property'], function() {
                Route::get('/manage', 'PropertyController@index');
                Route::post('/approve', 'PropertyController@approve');
                Route::post('/reject'. 'PropertyController@reject');
                Route::post('/ban', 'PropertyController@ban');
            });

            Route::group(['prefix' => 'sport'], function() {
                Route::get('/manage', 'SportController@index');
                Route::post('/insert', 'SportController@store');
                Route::post('/update', 'SportController@update');
                Route::get('/delete/{id}', 'SportController@destroy');
            });
        });
    });

    Route::group(['middleware' => ['owner']], function(){
        Route::group(['prefix' => 'property'], function() {
            Route::group(['middleware' => ['property.has']], function() {
                Route::get('/', 'PropertyController@indexPage')->name('indexProperty');
            });
            Route::group(['middleware' => ['property.not.has']], function() {
                Route::get('/insert', 'PropertyController@insertPropertyPage');
                Route::post('/insert', 'PropertyController@insertProperty')->name('insertProperty');
            });
        });
    });

    Route::group(['middleware' => ['customer']], function(){
    });

    Route::get('/logout', 'Auth\LoginController@logout');
});
Route::post('/api/schedule', 'ScheduleController@insertSchedule');