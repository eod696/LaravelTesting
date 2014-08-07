<?php

class LoginController extends BaseController {
	public function loginForm() {
		return View::make('login');
	}
	
	public function loginPost() {
		// Validation rules
		$rules = [
			'email' => 'required|between:3,64|email',
			'password' => 'required'
		];
		// Create validator
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->passes()){
			// Get user input
			$inEmail = Input::get('email');
			$inPswd = Input::get('password');
			
			// Attempt authentication
			if (Auth::attempt(['email' => $inEmail, 'password' => $inPswd])){
				// Auth succeeded, redirect
				return Redirect::intended('/users');
			}
			else {
				// Auth failed, inform user
				return Redirect::route('loginForm')->with('msg', 'Login failed.');
			}
		}
		// There is a problem with the form or authentication failed
		// Return redirect to login with validation errors
		return Redirect::route('loginForm')->withErrors($validator);
	}
	
	public function logout() {
		Auth::logout();
		return Redirect::intended('/users');
	}
}