<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Guests allowed
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@showWelcome']);

Route::get('login', ['as' => 'loginForm', 'uses' => 'LoginController@loginForm']);
Route::post('login', ['as' => 'loginPost', 'uses' => 'LoginController@loginPost']);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::get('users', ['as' => 'getUserIndex', 'uses' => 'UsersController@userIndex']);
Route::get('users/{id}', ['as' => 'getUser', 'uses' => 'UsersController@showProfile']);

// Auth required
Route::group(['before' => 'auth'], function()
{
	Route::get('users/{id}/edit', ['as' => 'editUser', 'uses' => 'UsersController@editUser']);
	Route::post('users/{id}/edit', ['as' => 'updateUser', 'uses' => 'UsersController@editUserPost']);
	
	Route::get('account', ['as' => 'editAccount', 'uses' => 'AccountController@editAccount']);
	Route::post('account', ['as' => 'updateAccount', 'uses' => 'AccountController@editAccountPost']);
});
