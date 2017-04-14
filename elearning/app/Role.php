<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'role';
	protected $primaryKey = 'id_role';
	protected $fillable = ['name','status'];
    

    /*MANY TO MANY*/

    public function users(){

        return $this->belongsToMany('App\User','user_role', 'id_role','id_user');
    }


    
    public function resources(){
    	return $this->belongsToMany('App\Resource','resource_role','id_role','id_resource');
    	//return $this->belongsToMany('App\Role','role','id_resource','id_role');

    }
    public function courses(){
    	return $this->belongsToMany('App\Role','course_role','id_role','id_course');
    }
}

