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
Route::get('register', 'LoginController@getRegister');
Route::get('drf', 'MainController@getDownload');
Route::get('gallery', 'MainController@getGallery');
Route::get('register-farmers', 'LoginController@getRegisterFarmers');
Route::post('register-farmers', 'LoginController@postRegisterFarmers');
Route::get('services', 'MainController@getServices');

Route::get('mission', 'MainController@getMission');
Route::get('contact', 'MainController@getContact');

Route::get('stocks', 'MainController@getStocks');


Route::get('payment/callback', 'PaymentController@getPaymentCallback');
Route::post('pay', 'PaymentController@postRedirectToGateway');

Route::get('paid', 'MainController@getPaid');

/**Admin routes **/
Route::get('admin', 'AdminController@getIndex');
Route::get('admin-surveys', 'AdminController@getSurveys');
Route::get('admin-members', 'AdminController@getMembers');
Route::get('admin-member', 'AdminController@getMember');
Route::get('admin-events', 'AdminController@getMember');

