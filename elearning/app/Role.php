<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'role';
	protected $primaryKey = 'id_role';
    public function users(){

        return $this->belongsToMany('App\User','user_role', 'id_role','id_user');
    }
}
