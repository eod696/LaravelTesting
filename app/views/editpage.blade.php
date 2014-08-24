@extends('layout')

@section('title')
	Edit the {{ $page->title }} page
@stop

@section('content')
	<a href="{{ route('getPage', ['slug' => $page->slug]) }}">View Page</a>
	<h1>Edit Page - {{ $page->title }}</h1>
	
	@if(Session::has('msg'))
		<div class="message">{{ Session::get('msg') }}</div>
	@endif
	
	{{ Form::model($page, ['route' => ['updatePage', $page->id]]) }}
		<table class="editTable">
			<tbody>
				<tr>
					<td class="formLabel"><label for="slug">Slug:</label></td>
					<td>{{ Form::text('slug') }}</td>
				</tr>
				<tr>
					<td class="formLabel"><label for="title">Title:</label></td>
					<td>{{ Form::text('title') }}</td>
				</tr>
				<tr>
					<td class="formLabel"><label for="body">Body:</label></td>
					<td>{{ Form::textarea('body') }}</td>
				</tr>
				<tr>
					<td colspan="3">
						{{ Form::submit('Save Changes to Page'); }}
					</td>
				</tr>			
			</tbody>
		</table>
	</form>
@stop