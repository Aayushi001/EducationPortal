<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionLikes extends Model
{
     protected $table = 'question_likes';

     public function question()
     {
     	return $this->hasOne('App\Post');
     }
}
