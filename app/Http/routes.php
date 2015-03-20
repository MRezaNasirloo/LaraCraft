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
/**
 * Home page routes
 */
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

/**
 * Shop routes
 */
Route::resource('shop', 'Shop\ShopController');

/**
 * Product routes
 */
Route::resource('product', 'ProductController');

/**
 * User routes
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
