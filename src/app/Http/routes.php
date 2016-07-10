<?php

use Illuminate\Session\TokenMismatchException;

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



/**
 * extends routes from vendor\jacopo\laravel-authentication-acl\app\Http\routes.php
 */
/**
 * User login and logout
 */
 Route::get('/', 'BdsController@index');
Route::group(['middleware' => ['web']], function () {
    /*
      |--------------------------------------------------------------------------
      | Admin side (auth required)
      |--------------------------------------------------------------------------
      |
     */
   
    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {
        
    });
});
