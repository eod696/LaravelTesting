<?php

class AccountController extends BaseController {
	// GET: /account
	public function editAccount(){
		$user = Auth::user();
		
		return View::make('editaccount', ['user' => $user]);
	}
	
	// POST: /account
	public function editAccountPost(){
		// Validation rules
		$rules = [
			'name' => 'required|between:3,100|alpha_dash',
			'email' => 'required|between:3,64|email',
			'current_password' => 'required'
		];
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->passes()){
			// Validator passed, check authentication
			$authUser = Auth::user();
			$user = User::find($authUser->id);
			
			if(Hash::check(Input::get('current_password'), $authUser->password)){
				// Authentication passed, update user
				$user->name = Input::get('name');
				$user->email = Input::get('email');
				if(Input::has('password')){
					$user->password = Hash::make(Input::get('password'));
				}
				// Save changes to db
				$user->save();
				
				return Redirect::route('editAccount')->with('msg', 'Your account has been updated!');
			}
			else {
				// Unauthenticated attempt, redirect
				return Redirect::route('editAccount')->with('msg', 'Your current password is incorrect.');
			}
		}
		else {
			// Validator failed, display error
			return Redirect::route('editAccount')->withErrors($validator);
		}
	}
}

?>