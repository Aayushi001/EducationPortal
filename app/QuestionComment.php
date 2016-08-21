<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{	
	 protected $table = 'question_comments';

    public function question()
    {
    	return $this->belongsTo('App\Post');
    }
}
