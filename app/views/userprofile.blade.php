@extends('layout')

@section('content')
	<a href="/users"><< Back</a>
	<h2>{{ $user->name }}</h2>
	<table>
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
	</table>
@stop