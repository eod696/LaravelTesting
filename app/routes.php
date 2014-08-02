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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('users', ['as' => 'getUserIndex', 'uses' => 'UsersController@userIndex']);
Route::get('users/{id}', ['as' => 'getUser', 'uses' => 'UsersController@showProfile']);
Route::get('users/{id}/edit', ['as' => 'editUser', 'uses' => 'UsersController@editUser']);
Route::post('users/{id}/edit', ['as' => 'updateUser', 'uses' => 'UsersController@editUserPost']);