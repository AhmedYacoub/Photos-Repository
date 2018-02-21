<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;

class PhotosController extends Controller
{
    public function create($id) 
    {
    	$album = Album::find($id);
    	return view('photos.create', compact(['id', 'album']));
    }

    public function store(Request $request, $id) {
    	
    	$this->validate($request, [
    		'name'  => 'required',
    		'photo' => 'image|max:1999'
    	]);

    	// original file name with file extension
    	$filenameWithExt = $request->file('photo')->getClientOriginalName(); 

    	// file name without extension
    	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

    	// file extension
    	$extension = $request->file('photo')->getClientOriginalExtension();

    	// stored filename
    	$filenameToStore = $filename.'_'.time().'.'.$extension;

    	// Upload file
    	$path = $request->file('photo')->storeAs('public/photos/'.$id, $filenameToStore);

    	// Start creating an Album
    	$photo = new Photo;
    	$photo->album_id = $id;
    	$photo->title = $request->input('name');
    	$photo->description = $request->input('description');
    	$photo->photo = $filenameToStore;
    	$photo->size = $request->file('photo')->getClientSize();
    	$photo->save();

    	// Redirect to home page
    	return redirect("/albums/$id")->with('success', 'Photo Uploaded!');
    }

    public function show($id)
    {
    	$photo = Photo::find($id);

    	return view('photos.show', compact('photo'));
    }

    public function destroy($id)
    {
    	Photo::find($id)->delete();

    	return redirect('/')->with('success', 'Photo deleted!');
    }
}
