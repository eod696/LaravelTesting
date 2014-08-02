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

Route::get('users/{id}', ['as' => 'getUser', 'uses' => 'UsersController@showProfile']);

Route::get('users/{id}/edit', ['as' => 'editUser', 'uses' => 'UsersController@editUser']);
Route::post('users/{id}/edit', ['as' => 'updateUser', function($id)
{
	$user = User::find($id);
	
	// Server-side validation
	$rules = array(
		'name' => 'required|between:3,100|alpha_dash',
		'email' => 'required|between:3,64|email'
	);
	$validator = Validator::make(Input::all(), $rules);
	
	if($validator->passes()){
		// Validator passed, so update the user details
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		// Save changes to db
		$user->save();
		
		return Redirect::route('getUser', ['id' => $id]);
	}
	else {
		// Validator failed for some reason, display error
		return Redirect::route('editUser', ['id' => $id])->withErrors($validator);
	}
}]);