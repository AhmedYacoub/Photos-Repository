@extends('layouts.app')

@section('content')
	
	{{-- Back --}}
	<a href="/albums/{{ $photo->album_id }}" class="btn btn-default">
		<i class="glyphicon glyphicon-chevron-left"></i>
		Back
	</a>

	{{-- Delete --}}
	{!! Form::open( ['action'=>['PhotosController@destroy', $photo->id], 
        'method'=>'DELETE',
        'onsubmit'=>'return confirm("Are you sure?")' ]) !!}
    {!! Form::button('<span class="glyphicon glyphicon-trash"> Delete<span>', 
        ['type'=>'submit', 'class'=>'btn btn-danger pull-right']) !!}
    {!! Form::close() !!}

	<h2 class="text-center">{{ $photo->title }}</h2>
	<div class="thumbnail" style="border: none;">
        <img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->description }}" class="img-responsive">

        <div class="caption text-center">
          <p>{{ $photo->description }}</p>
        </div>
    </div>
@endsection