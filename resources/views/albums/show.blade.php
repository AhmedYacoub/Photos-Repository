@extends('layouts.app')

@section('content')
	
	<h2>{{ $albums->name }}</h2>

	{{-- Back button --}}
	<a href="/" class="btn btn-default">
		<span><i class="glyphicon glyphicon-chevron-left"></i></span>
		 Go Back
	</a>

	{{-- Add new photo to this album button --}}
	<a href="/photos/create/{{ $albums->id }}" class="btn btn-primary">
		<span><i class="glyphicon glyphicon-plus"></i></span>
		Upload Photo to this album
	</a>

	<br>
	<br>

	{{-- Show all photos of this album --}}
	@if(count($albums->photo) > 0)
	 <div class="row">
	 @foreach($albums->photo as $photo)
	  <div class="col-md-3">
	    <div class="thumbnail" id="thumbGal">

	      <a href="/photos/{{ $photo->id }}">

	        <img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->description }}" class="img-responsive" id="imgGal">

	        <div class="caption text-center">
	          <p>{{ $photo->title }}</p>
	        </div>

	      </a>
	    </div>
	  </div>
	  @endforeach
	</div>
	@else
		<p>No photos uploaded yet! <a href="/photos/create/{{ $albums->id }}">Create new album</a></p>
	@endif

@endsection