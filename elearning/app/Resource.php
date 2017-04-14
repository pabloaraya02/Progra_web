<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $table = 'Resource';
    protected $primaryKey = 'id_resource';
    protected $fillable = ['name','url','id_resource_type','resource_father','visible','sequence','notes','status','id_week'];
    
    /*This is the self reference relationship*/
    public function resourceFather(){
    	return $this->belongsTo('Resource','id_resource');
    }
    public function resourceChildren(){
    	return $this->hasMany('Resource','id_resource');
    }


    /*Normal references*/
    public function week(){

    	return $this->belongsTo('App\Week','id_week','id_week');
    	//return $this->belongsTo('App\Week','id_week');
    }
    public function resource_type(){
    	return $this->belongsTo('App\Resource_type','id_resource_type','id_resource_type');
    }

    /*MANY TO MANY*/
    public function roles(){
    	return $this->belongsToMany('App\Role','resource_role','id_resource','id_role');
    	//return $this->belongsToMany('App\Role','role','id_resource','id_role');

    }
}
