<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function assignments(){
    	//return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }
}
