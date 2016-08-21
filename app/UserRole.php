<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
     protected $table = 'user_role';
     public $incrementing = false

     public function roles()
     {
     	return $this->belongsToMany('App\Role');
     }

     public function users()
     {
     	return $this->belongsToMany('App\User');
     }
}
