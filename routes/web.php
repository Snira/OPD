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



Route::get('/', 'HomeController@index')->name('home');
Route::get('/bewustwording','HomeController@avg')->name('avg');

Route::get('/{nodename}', 'HomeController@show')->name('server');
Route::get('/{nodename}/{website}', 'WebsiteController@website')->name('website');
Route::post('/{nodename}/{website}', 'WebsiteController@search')->name('search');
Route::get('/{nodename}/{website}/{directory}', 'WebsiteController@subDomain')->name('subdomain');
