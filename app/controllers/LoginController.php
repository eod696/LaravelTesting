<?php

class LoginController extends BaseController {
	public function loginForm() {
		return View::make('login');
	}
	
	public function loginPost() {
		if(Input::has('email') && Input::has('password')){
			$usr = User::where('email', '=', Input::get('email'))->firstOrFail();
			$stPswd = $usr->password;
			$inPswd = Input::get('password');
			$email = Input::get('email');
			
			$passwordGood = Hash::check($inPswd, $stPswd);
			
			if ($passwordGood && Auth::attempt(['email' => $email, 'password' => $inPswd])){
				return Redirect::intended('index');
			}
		}
		else {
			// Return redirect to login with validation errors
			return Redirect::route('loginForm');
		}
	}
}