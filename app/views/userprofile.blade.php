@extends('layout')

@section('title')
	View User {{ $user->name }}
@stop

@section('content')
	<a href="{{ route('getUserIndex') }}"><< Back</a>
	<h2>{{ $user->name }}</h2>
	<table class="users">
		<tr>
			<td><b>ID:</b></td>
			<td>{{ $user->id }}</td>
		</tr>
		<tr>
			<td><b>Email:</b></td>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<td><b>Created at:</b></td>
			<td>{{ $user->created_at }}</td>
		</tr>
		<tr>
			<td><b>Updated at:</b></td>
			<td>{{ $user->updated_at }}</td>
		</tr>
		<tr>
			<td colspan="2">
				<button class="editUserBtn" onclick="window.location.replace('{{ Request::url(); }}/edit')">
					Edit this user
				</button>
			</td>
		</tr>
	</table>
@stop