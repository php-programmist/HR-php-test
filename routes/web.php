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

/*DB::listen(function($query) {
    dump($query->sql, $query->bindings);
});*/
Route::get('/', 'WeatherController@index');
Route::resource('/orders', 'OrderController');
