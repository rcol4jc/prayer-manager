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
Route::view('/', 'front')->name('front');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/request', 'PrayerrequestController@index')->name('request.index');
Route::get('/request/new', 'PrayerrequestController@new');
Route::post('/request/save', 'PrayerrequestController@save')->name('request.save');
Route::get('/request/{id}/edit', 'PrayerrequestController@edit')->name('request.edit');
Route::post('/request/{id}/save', 'PrayerrequestController@change')->name('request.change');
Route::get('/request/{id}', 'PrayerrequestController@show')->name('request.show');
Route::post('/request/{id}/pray', 'PrayerrequestController@pray')->name('request.pray');
Route::post('/response/{id}/edit', 'PrayerresponseController@edit')->name('response.edit');
Route::post('/response/{request_id}/save', 'PrayerresponseController@save')->name('response.save');
Route::get('/request/{request_id}/partners', 'PrayerrequestController@showPartners')->name('request.showPartners');


