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

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@showWelcome']);

Route::get('login', ['as' => 'loginForm', 'uses' => 'LoginController@loginForm']);
Route::post('login', ['as' => 'loginPost', 'uses' => 'LoginController@loginPost']);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::get('users', ['as' => 'getUserIndex', 'uses' => 'UsersController@userIndex']);
Route::get('users/{id}', ['as' => 'getUser', 'uses' => 'UsersController@showProfile']);
Route::get('users/{id}/edit', [
	'before' => 'auth', 
	'as' => 'editUser', 
	'uses' => 'UsersController@editUser'
]);
Route::post('users/{id}/edit', [
	'before' => 'auth', 
	'as' => 'updateUser', 
	'uses' => 'UsersController@editUserPost'
]);