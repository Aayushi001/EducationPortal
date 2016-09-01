<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'questions';

    public function comments()
    {
    	return $this->hasMany('App\comment');
		
    }
	
	public function likes(){
		
		return $this->hasMany("App\likes");
	}
}
