<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $table = 'assignment';
    protected $primaryKey = 'id_assignment';
    protected $fillable = ['id_course','description','grade','creation_date','delivery_date','score'];
    //Una tarea pertenece a un curso
    public function course(){
    	//return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    	//return $this->belongsTo('App\Post', 'foreign_key', 'other_key');
    	return $this->belongsTo('App\Assignment', 'id_course','id_course');
    }
    
}
