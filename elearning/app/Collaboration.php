<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    //
    protected $table = 'collaboration';
    protected $primaryKey = 'id_collaboration';
	protected $fillable = ['','','','','',''];
    public function collaborationType(){
    	return $this->belongsTo('App\Collaboration_type','id_collaboration_type','id_collaboration_type');
    }

    public function collaborationFather(){
    	return $this->belongsTo('collaboration','id_collaboration');
    }
    public function CollaborationChildren(){
    	return $this->hasMany('collaboration','id_collaboration');
    }
}
