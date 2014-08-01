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

Route::get('users', function()
{
	$users = User::all();
	$url = URL::to('users');
	
    return View::make('users')->with(array(
		'users' => $users,
		'url' => $url
	));
});

Route::get('users/{id}', array('as' => 'getUser', 'uses' => 'UsersController@showProfile'));

Route::get('users/{id}/edit', 'UsersController@editUser');
Route::post('users/{id}/edit', array('as' => 'updateUser', function($id)
{
	$user = User::find($id);
	
	if(Input::has('name')) $user->name = Input::get('name');
	if(Input::has('email')) $user->email = Input::get('email');
	
	$user->save();
	
	return Redirect::route('getUser', array('id' => $id));
}));