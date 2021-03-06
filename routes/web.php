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



Auth::routes();
Route::get('/', 'GuestController@front')->name('front');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/request', 'PrayerrequestController@index')->name('request.index');
Route::get('/request/new', 'PrayerrequestController@new')->name('request.new');
Route::post('/request/save', 'PrayerrequestController@save')->name('request.save');
Route::get('/request/{id}/edit', 'PrayerrequestController@edit')->name('request.edit');
Route::post('/request/{id}/save', 'PrayerrequestController@change')->name('request.change');
Route::get('/request/{id}', 'PrayerrequestController@show')->name('request.show');
Route::post('/request/{id}/pray', 'PrayerrequestController@pray')->name('request.pray');
Route::get('/request/{request_id}/partners', 'PrayerrequestController@showPartners')->name('request.showPartners');
Route::delete('/request/{id}/delete', 'PrayerrequestController@delete')->name('request.delete');

Route::get('/response', 'PrayerresponseController@index')->name('response.index');
Route::get('/response/{id}/edit', 'PrayerresponseController@edit')->name('response.edit');
Route::post('/response/{id}/change', 'PrayerresponseController@change')->name('response.save');
Route::post('/response/{request_id}/save', 'PrayerresponseController@save')->name('response.new.save');
Route::delete('/response/{id}/delete', 'PrayerresponseController@delete')->name('response.delete');



