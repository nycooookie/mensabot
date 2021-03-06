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

Route::get('/', 'TelegramController@index');

Route::get('/import', 'ImportController@import');

Route::group(['prefix' => 'webhook'], function () {
	Route::post('/', 'TelegramController@webhook');
    Route::get('/register', 'TelegramController@register');
});