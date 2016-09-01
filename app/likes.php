<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    public function post()
	{return $this->belongsTo('App\Post');}
	
	public function question_comment()
	{return $this->belongsTo('App\QuestionComment');}
}
