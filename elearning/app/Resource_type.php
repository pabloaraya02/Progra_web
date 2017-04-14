<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource_type extends Model
{
    //
    protected $table = 'Resource_type';
    protected $primaryKey = 'id_resource_type';
    protected $fillable = ['resource_name'];
    
    public function resources(){
    	return $this->hasMany('App\Resource','id_resource_type','id_resource_type');
    }
}
