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



Auth::routes();

Route::get('/','MainController@index');


Route::get('/getHotel','AJAXController@getHotel');

Route::get('/rentHotel','MainController@rentHotel');

Route::get('/rent','RentController@rent');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/','AdminController@index')->name('admin.dashboard');


    Route::get('/hotels','Admin\HotelController@index');

    Route::get('/orderList','Admin\HotelController@orderList');

    Route::get('/order/{history}','Admin\HotelController@detailOrder');

    Route::get('/confirm/{history}','Admin\HotelController@confirm');

    Route::get('/unconfirm/{history}','Admin\HotelController@unconfirm');

    Route::get('/finish/{history}','Admin\HotelController@finish');

    Route::get('/unfinish/{history}','Admin\HotelController@unfinish');

    Route::get('/hotels/{hotel}','Admin\HotelController@show');

    Route::delete('/hotels/{hotel}','Admin\HotelController@destroy');

    Route::get('/hotels/{hotel}/edit','Admin\HotelController@edit');

    Route::patch('/hotels/{hotel}','Admin\HotelController@update');

    Route::get('/hotels/alamat/{hotel}/edit','Admin\HotelController@editAlamat');

    Route::patch('/hotels/alamat/{hotel}','Admin\HotelController@updateAlamat');

    Route::get('/add-hotel','Admin\HotelController@create');

    Route::post('/add-hotel','Admin\HotelController@store')->name('post.add-hotel');

    Route::get('/rooms','Admin\RoomsController@index');

    Route::get('/rooms/{room_detail}','Admin\RoomsController@show');

    Route::delete('/rooms/{room_detail}','Admin\RoomsController@destroy');

    Route::get('rooms/{hotel}/add-room','Admin\RoomsController@create');

    Route::post('rooms/{hotel}','Admin\RoomsController@store');

    Route::get('/rooms/{room_detail}/edit','Admin\RoomsController@edit');

    Route::patch('/rooms/{room_detail}','Admin\RoomsController@update');

    Route::get('/getUserCount','AdminController@getUserCount')->name('admin.userCount');

    Route::get('/getHotelCount','AdminController@getHotelCount')->name('admin.hotelCount');

    Route::get('/getOrderCount','AdminController@getOrderCount')->name('admin.orderCount');

    Route::get('/hotelStat','AdminController@showHotelStat')->name('admin.hotelStat');

    Route::get('/userStat','AdminController@showUserStat')->name('admin.userStat');

    Route::get('/orderStat','AdminController@showOrderStat')->name('admin.orderStat');

    Route::get('/getUserCountDetails','AdminController@getUserCountDetails')->name('admin.userCountDetail');

    Route::get('/getHotelCountDetails','AdminController@getHotelCountDetails')->name('admin.hotelCountDetail');

    Route::get('/getOrderCountDetails','AdminController@getOrderCountDetails')->name('admin.orderCountDetail');

    Route::patch('/hotels_restore/{id}','Admin\HotelController@restore');

    Route::patch('/room_restore/{id}','Admin\RoomsController@restore');

});

Route::post('/updateProfile','UserController@updateProfile');

Route::get('/profile','UserController@profile');

Route::post('/changePass','UserController@changePassword');

Route::post('/profile','UserController@profile');

Route::post('/changePass', 'UserController@changePassword');

Route::post('/rentFinal','RentController@rentFinal');

Route::post('/history','UserController@history');

Route::post('/historyRating','UserController@rating');

Route::get('/history','UserController@history');

Route::post('/history/{id}','UserController@history_detail');

Route::get('/searchBox','AJAXController@search');

Route::post('/getKota','AJAXController@getKota');

Route::get('/showRoom','MainController@showRoom');

Route::get('/getRoom', 'MainController@getRoomWithCount');

Route::get('/minMaxRating','AJAXController@getMinMaxRating');


Route::get('/minMaxCost','AJAXController@getMinMaxCost');


