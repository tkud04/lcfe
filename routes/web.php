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

#Route::get('/', function(){return "<h2 style='color: red;'>Out of service</h2>";});

Route::get('/', 'MainController@getIndex');

Route::get('about', 'MainController@getAbout');
Route::get('register', 'MainController@getRegister');
Route::get('register-farmers', 'MainController@getRegisterFarmers');
Route::get('services', 'MainController@getServices');

Route::get('mission', 'MainController@getMission');
Route::get('contact', 'MainController@getContact');
