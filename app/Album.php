<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // protected $table = 'albums';
    protected $fillable = ['name', 'description', 'cover_image'];
 
    
    // one to many relationship
    public function photo()
    {
    	return $this->hasMany('App\Photo');
    }
}
