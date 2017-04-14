<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    //
    protected $table = 'week';
    protected $primaryKey = 'id_week';
    protected $fillable = ['subject','visible','status','id_course'];
    
    public function course(){
    	return $this->belongsTo('App\Course', 'id_course','id_course');
    }
    public function resources(){
    	return $this->hasMany('App\Resource','id_week','id_week');
    }
}
