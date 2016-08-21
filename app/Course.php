<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    public function tutorials()
    {
    	 return $this->hasMany('App\Tutorial');
    }
}
