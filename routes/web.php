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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::resource('admin/seats', 'SeatController');
    Route::resource('admin/films', 'FilmController');
    Route::resource('admin/show-times', 'ShowTimeController');
    Route::resource('admin/bookings', 'BookingController');
    Route::get('show-times/{showTime}/bookings', 'ShowTimeController@showBookings')->name('show.bookings');
    Route::get('show-times/history', 'ShowTimeController@pastShows')->name('past.shows');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('bookings/step1', 'BookingController@stepOne')->name('user.booking.step1');
    Route::post('bookings/step1', 'BookingController@postStepOne')->name('user.post.booking.step1');
    Route::get('bookings/step2', 'BookingController@stepTwo')->name('user.booking.step2');
    Route::post('bookings/step2', 'BookingController@postStepTwo')->name('user.post.booking.step2');
    Route::get('user/bookings', 'BookingController@userBookings')->name('user.bookings');
});