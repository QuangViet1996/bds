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

Route::get('/', 'BdsController@index');

Route::get('/admin/houses', [
    'as' => 'houses.list',
    'uses' => '\App\Http\Controllers\HousesController@getHouses'
]);

Route::get('/admin/houses', [
    'as' => 'houses.list',
    'uses' => '\App\Http\Controllers\HousesController@getHouses'
]);

Route::get('/admin/houses', [
    'as' => 'houses.list',
    'uses' => '\App\Http\Controllers\HousesController@getHouses'
]);

Route::get('/admin/houses', [
    'as' => 'houses.list',
    'uses' => '\App\Http\Controllers\HousesController@getHouses'
]);
