<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
	 protected $table = 'tutorials';

    public function courses()
    {

     return $this->belongsTo('App\Course');

	}
}
