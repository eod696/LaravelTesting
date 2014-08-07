@extends('layout')

@section('title')
	Login
@stop

@section('content')
	<h3>Login Form</h3>
	@if(Session::has('msg'))
		<div class="message">{{ Session::get('msg') }}</div>
	@endif
	{{ Form::open(['route' => 'loginPost', 'class' => 'loginForm']) }}
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email', 'your@email.com') }}
		@if($errors->has('email'))
			@foreach($errors->get('email') as $error)
				<div class="errorText">{{ $error }}</div>
			@endforeach
		@endif
		<br/>
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password') }}
		@if($errors->has('password'))
			@foreach($errors->get('password') as $error)
				<div class="errorText">{{ $error }}</div>
			@endforeach
		@endif
		<br/>
		{{ Form::submit('Login') }}
	{{ Form::close() }}
@stop