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

/* ***********
 * Public Routes
 *************/
// Main index
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@showWelcome']);

// Login/logout
Route::get('login', ['as' => 'loginForm', 'uses' => 'LoginController@loginForm']);
Route::post('login', ['as' => 'loginPost', 'uses' => 'LoginController@loginPost']);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

// View Users
Route::get('users', ['as' => 'getUserIndex', 'uses' => 'UsersController@userIndex']);
Route::get('users/{id}', ['as' => 'getUser', 'uses' => 'UsersController@showProfile']);

/*************
 * Auth required
 *************/
Route::group(['before' => 'auth'], function()
{
	// Edit Account
	Route::get('account', ['as' => 'editAccount', 'uses' => 'AccountController@editAccount']);
	Route::post('account', ['as' => 'updateAccount', 'uses' => 'AccountController@editAccountPost']);
	
	/*
	 * Administration routes
	 * ==============
	 * Restrict these routes to a specific group
	 */
	// Edit Users
	Route::get('admin/edit-user/{id}', ['as' => 'editUser', 'uses' => 'UsersController@editUser']);
	Route::post('admin/edit-user/{id}', ['as' => 'updateUser', 'uses' => 'UsersController@editUserPost']);
	
	// Edit Page
	Route::get('admin/edit-page/{id}', ['as' => 'editPage', 'uses' => 'ContentController@editPage']);
	Route::post('admin/edit-page/{id}', ['as' => 'updatePage', 'uses' => 'ContentController@updatePage']);
});

// View Content
// *IMPORTANT* Must be defined last to not overwrite base URL routes (i.e. /account and /users).
Route::get('{slug}', ['as' => 'getPage', 'uses' => 'ContentController@getPage']);
