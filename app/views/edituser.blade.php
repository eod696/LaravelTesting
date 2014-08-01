@extends('layout')

@section('content')
	<a href="/users"><< Back</a>
	<h1>Edit User</h1>
	{{ Form::model($user, array('route' => array('updateUser', $user->id))) }}
	{{ Form::text('name'); }}
	{{ Form::text('email'); }}
	{{ Form::submit('submit form'); }}
	
@stop