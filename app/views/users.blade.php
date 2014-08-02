@extends('layout')

@section('content')
    <table class="users">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created At</th>
				<th>Updated At</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td><a href="{{ $url }}/{{ $user->id }}">{{ $user->id }}</a></td>
				<td><a href="{{ $url }}/{{ $user->id }}">{{ $user->name }}</a></td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->created_at }}</td>
				<td>{{ $user->updated_at }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop