@extends('layouts.app')

@section('content')

	<h2>Albums</h2>

	@if(count($albums))
	 <div class="row">
	 @foreach($albums as $album)
	  <div class="col-md-3">
	    <div class="thumbnail" id="thumbGal">
	      <a href="/albums/{{ $album->id }}">
	        <img src="storage/album_cover/{{ $album->cover_image }}" alt="{{ $album->description }}" class="img-responsive" id="imgGal">
	        <div class="caption text-center">
	          <p>{{ $album->name }}</p>
	        </div>
	      </a>
	    </div>
	  </div>
	  @endforeach
	</div>
	@else
		<p>No albums created yet! <a href="/albums/create">Create new album</a></p>
	@endif

@endsection