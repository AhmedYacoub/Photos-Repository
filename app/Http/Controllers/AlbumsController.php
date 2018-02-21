<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index()
    {
    	$albums = Album::with('Photo')->get();

    	return view('albums.index', compact('albums'));
    }

    public function create()
    {
    	return view('albums.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'cover_image' => 'image|max:1999'
    	]);

    	// original file name with file extension
    	$filenameWithExt = $request->file('cover_image')->getClientOriginalName(); 

    	// file name without extension
    	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

    	// file extension
    	$extension = $request->file('cover_image')->getClientOriginalExtension();

    	// stored filename
    	$filenameToStore = $filename.'_'.time().'.'.$extension;

    	// Upload file
    	$path = $request->file('cover_image')->storeAs('public/album_cover', $filenameToStore);

    	// Start creating an Album
    	$album = new Album;
    	$album->name = $request->input('name');
    	$album->description = $request->input('description');
    	$album->cover_image = $filenameToStore;
    	$album->save();

    	// Redirect to home page
    	return redirect('/')->with('success', 'Album Created!');
    }

    public function show($id) {
        $albums = Album::with('Photo')->find($id);

        return view('albums.show', compact('albums'));
    }
}

