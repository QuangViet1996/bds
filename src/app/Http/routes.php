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

Route::get('/view', [
    'as' => 'bds.view',
    'uses' => '\App\Http\Controllers\BdsController@bdsView'
]);

Route::get('/list', [
    'as' => 'bds.list',
    'uses' => '\App\Http\Controllers\BdsController@bdsList'
]);

Route::get('/cat', [
    'as' => 'bds.cat',
    'uses' => '\App\Http\Controllers\BdsController@bdsCat'
]);

Route::get('/cat/detail', [
    'as' => 'bds.cat_detail',
    'uses' => '\App\Http\Controllers\BdsController@bdsCatDetail'
]);

Route::get('/contact', [
    'as' => 'bds.contact',
    'uses' => '\App\Http\Controllers\BdsController@bdsContact'
]);
