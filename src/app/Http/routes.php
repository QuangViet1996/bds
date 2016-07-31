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

Route::get('/', 'ReController@index');
Route::get('/home', [
    'as' => 're.home',
    'uses' => '\App\Http\Controllers\ReController@index'
]);
Route::get('/view', [
    'as' => 're.view',
    'uses' => '\App\Http\Controllers\ReController@reView'
]);

Route::get('/list', [
    'as' => 're.list',
    'uses' => '\App\Http\Controllers\ReController@reList'
]);

Route::get('/category', [
    'as' => 're.category',
    'uses' => '\App\Http\Controllers\ReController@reCategory'
]);

Route::get('/contact', [
    'as' => 're.contact',
    'uses' => '\App\Http\Controllers\ReController@reContact'
]);
Route::post('/contact', [
    'as' => 'usercontact.edit',
    'uses' => '\App\Http\Controllers\ReController@postContact'
]);

Route::get('/add', [
    'as' => 'reg_re.add',
    'uses' => '\App\Http\Controllers\ReController@regAdd'
]);

