<?php

class UsersController extends BaseController {
	// GET: /users
	public function userIndex() {
		$users = User::all();
		$url = URL::to('users');
		
		return View::make('users')->with(['users' => $users, 'url' => $url ]);
	}

	// GET: /users/{id}
	public function showProfile($id) {
		$user = User::find($id);
		
		return View::make('userprofile', array('user' => $user));
	}
	
	// GET: /users/{id}/edit
	public function editUser($id) {
		$user = User::find($id);
		
		return View::make('edituser', array('user' => $user));
	}
	
	// POST: /users/{id}/edit
	public function editUserPost($id) {
		$user = User::find($id);
	
		// Validation rules
		$rules = array(
			'name' => 'required|between:3,100|alpha_dash',
			'email' => 'required|between:3,64|email'
		);
		// Create validator
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
	}
}
?>