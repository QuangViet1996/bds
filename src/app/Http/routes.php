<?php


Route::get('/', [
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

