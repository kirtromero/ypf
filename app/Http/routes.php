<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('out/{id}/{any}', 'HomeController@showOut');
Route::get('search/{any}', 'HomeController@showSearch');
Route::get('search', 'HomeController@showBySort');
Route::get('/', 'HomeController@showHome');
