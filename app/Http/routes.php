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
 * Photo routes
 */
Route::resource('photo', 'PhotoController');

/**
 * Category routes
 */
Route::resource('category', 'CategoryController');
Route::get('category/children/{id}', 'CategoryController@getChildren');

/**
 * User routes
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*
|--------------------------------------------------------------------------
| Application API Routes
|--------------------------------------------------------------------------
|
| Here is where API routes is defined.
|
*/

Route::post('/oauth/access_token', function() {
	return Response::json(Authorizer::issueAccessToken());
});

APIRoute::version('v1', ['namespace' => 'App\API\V1\Http\Controllers'], function () {
    APIRoute::resource('shops', 'ShopController');
    //doesn't work with 'shop' WTF!!!? UPDATE: it might because of route model binding to shop route
});
