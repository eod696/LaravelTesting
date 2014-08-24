@extends('layout')

@section('title')
	Edit Your Account {{ $user->name }}
@stop

@section('content')
	<a href="{{ URL::previous() }}"><< Back</a>
	<h1>Your Account</h1>
	@if(Session::has('msg'))
		<div class="message">{{ Session::get('msg') }}</div>
	@endif
	{{ Form::model($user, ['route' => 'updateAccount']) }}
		<table class="editTable">
			<tbody>
				<tr>
					<td class="formLabel"><label for="name">Name:</label></td>
					<td>{{ Form::text('name'); }}</td>
					<td class="errorText">
						@if($errors->has('name'))	
							@foreach($errors->get('name') as $error)
								<label>{{ $error }}</label>
							@endforeach
						@endif
					</td>
				</tr>
				<tr>
					<td class="formLabel"><label for="email">Email:</label></td>
					<td>{{ Form::text('email'); }}</td>
					<td class="errorText">
						@if($errors->has('email'))
							@foreach($errors->get('email') as $error)
								<label>{{ $error }}</label>
							@endforeach
						@endif
					</td>
				</tr>
				<tr>
					<td class="formLabel"><label for="password">Current Password:</label></td>
					<td><input type="password" name="current_password" /></td>
					<td class="errorText">
						@if($errors->has('current_password'))
							@foreach($errors->get('current_password') as $error)
								<label>{{ $error }}</label>
							@endforeach
						@endif
					</td>
				</tr>
				<tr>
					<td class="formLabel"><label for="password">New Password:</label></td>
					<td>{{ Form::password('password'); }}</td>
					<td class="errorText">
						@if($errors->has('password'))
							@foreach($errors->get('password') as $error)
								<label>{{ $error }}</label>
							@endforeach
						@endif
					</td>
				</tr>
				<tr>
					<td colspan="3">
						{{ Form::submit('Save Changes to User'); }}
					</td>
				</tr>
			</tbody>
		</table>
	</form>
@stop