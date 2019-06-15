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
                Route::get('/approve/{id}', 'PropertyController@approve');
                Route::get('/reject{id}'. 'PropertyController@reject');
                Route::get('/ban/{id}', 'PropertyController@ban');
            });

            Route::group(['prefix' => 'sport'], function() {
                Route::get('/manage', 'MasterSportController@view');
                Route::post('/insert', 'MasterSportController@insert');
                Route::post('/update', 'MasterSportController@update');
                Route::get('/delete/{id}', 'MasterSportController@delete');
            });

            Route::group(['prefix' => 'bank'], function() {
                Route::get('/manage', 'MasterBankController@view');
                Route::post('/insert', 'MasterBankController@insert');
                Route::post('/update', 'MasterBankController@update');
                Route::get('/delete/{id}', 'MasterBankController@delete');
            });
        });
    });

    Route::group(['middleware' => ['owner']], function(){
        Route::get('/dashboard', 'PropertyController@dashboard');
        Route::post('/subscription', 'SubscriptionController@subscription');

        Route::group(['prefix' => 'property'], function() {
            Route::group(['middleware' => ['property.has']], function() {
                Route::get('/update', 'PropertyController@updatePropertyPage');
            });

            Route::group(['middleware' => ['property.not.has']], function() {
                Route::get('/insert', 'PropertyController@insertPropertyPage');
                Route::post('/insert', 'PropertyController@insertProperty')->name('insertProperty');
            });
        });

        Route::group(['prefix' => 'payment'], function () {
            Route::post('/insert', 'PaymentController@insert');
            Route::post('/update', 'PaymentController@update');
            Route::get('/delete/{id}', 'PaymentController@delete');
        });
    });

    Route::group(['middleware' => ['customer']], function(){

    });

    Route::get('/logout', 'Auth\LoginController@logout');
});
Route::post('/api/schedule', 'ScheduleController@insertSchedule');