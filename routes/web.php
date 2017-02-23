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

Route::get('/', 'ImportController@index');

Route::get('/mensa', 'ImportController@import');

Route::get('/bot', 'TelegramController@index');

Route::get('webhook/register', 'TelegramController@register');

Route::post('/webhook', 'TelegramController@webhook');