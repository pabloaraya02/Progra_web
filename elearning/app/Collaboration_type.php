<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaboration_type extends Model
{
    //
    protected $table = 'collaboration_type';
    protected $primaryKey = 'id_collaboration_type';
    protected $fillable = [''];
    public function collaborations(){
    	return $this->hasMany('App\collaboration','id_collaboration_type','id_collaboration_type');
    }
}
