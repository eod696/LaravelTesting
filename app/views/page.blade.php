@extends('layout')

@section('title')
	{{ $page->title }} | Dan's Laravel Testing
@stop

@section('content')
	@if (Auth::check())
		<a href="{{ route('editPage', ['id' => $page->id]) }}" class="editLink">Edit This Page</a>
	@endif
	<h1>{{ $page->title }}</h1>
	<div class="pageBody">
		{{ $page->body }}
	</div>
	@if (Auth::check())
		<a href="{{ route('editPage', ['id' => $page->id]) }}" class="editLink">Edit This Page</a>
	@endif
@stop