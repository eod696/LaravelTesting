@extends('layout')

@section('title')
	Edit User {{ $user->name }}
@stop

@section('content')
	<a href="{{ route('getUserIndex') }}/{{ $user->id }}"><< Back</a>
	<h1>Edit User</h1>
	{{ Form::model($user, ['route' => ['updateUser', $user->id]]) }}
		<table class="editUser">
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
					<td colspan="3">
						{{ Form::submit('Save Changes to User'); }}
					</td>
				</tr>
			</tbody>
		</table>
	</form>
@stop