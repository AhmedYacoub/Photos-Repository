@extends('layouts.app')

@section('content')
	
	<h2>Add new album</h2>

	{{-- Start form --}}
	{!! Form::open(['action'=>'AlbumsController@store', 
		'method'=>'POST', 
		'enctype'=>'multipart/form-data']) !!}

	<div class="form-group">
		{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Album Name...']) !!}
	</div>

	<div class="form-group">
		{!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Album Description...']) !!}
	</div>

	<div class="form-group">
		{!! Form::file('cover_image', []) !!}
	</div>

	{!! Form::submit('Submit', ['class'=>'btn btn-default']) !!}

	{!! Form::close() !!}
	{{-- End form --}}

@endsection