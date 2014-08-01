<?php

class UsersController extends BaseController {
	public function showProfile($id) {
		$user = User::find($id);
		
		return View::make('userprofile', array('user' => $user));
	}
}
?>