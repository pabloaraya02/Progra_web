<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    public function cursos(){
    	return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    	return $this->belongs
    }
}
