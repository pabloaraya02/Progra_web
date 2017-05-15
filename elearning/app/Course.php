<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    protected $table = 'course';
    protected $primaryKey = 'id_course';
    public $timestamps = false;
    //duration es cantidad de semanas creo
    protected $fillable = ['course_name','duration','start_date','end_date'];


    public function assignments(){
    	//foreign_key on assignment
    	//return $this->hasMany('App\Assignment', 'foreign_key', 'local_key');
    	return $this->hasMany('App\Assignment', 'id_course','id_course');
    }
    public function weeks(){

    	return $this->hasMany('App\Week', 'id_course','id_course');
    }
    public function enrollments(){

    	return $this->hasMany('App\Enrrollment', 'id_course','id_course');
    }

    /*MANY  TO MANY*/
    public function roles(){

        return $this->belongsToMany('App\Role','course_role','id_course','id_role');
    }
}
