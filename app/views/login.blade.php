@extends('layout')

@section('title')
	Login
@stop

@section('content')
	<h3>Login</h3>
	{{ Form::open(['route', 'loginPost']) }}
		{{ Form::text('email', 'your@email.com') }}<br/>
		{{ Form::password('password') }}<br/>
		{{ Form::submit('Login') }}
	{{ Form::close() }}
@stop