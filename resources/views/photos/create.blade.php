@extends('layouts.app')

@section('content')
	
	<h2>Upload new photo to <b>{{ $album->name }}</b> album</h2>

	{{-- Start form --}}
	{!! Form::open(['action'=>['PhotosController@store', $album->id], 
		'method'=>'POST', 
		'enctype'=>'multipart/form-data']) !!}

	<div class="form-group">
		{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Photo Name...']) !!}
	</div>

	<div class="form-group">
		{!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Photo Description...']) !!}
	</div>

	<div class="form-group">
		{!! Form::file('photo', []) !!}
	</div>

	{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

	{!! Form::close() !!}
	{{-- End form --}}

@endsection