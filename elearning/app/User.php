<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'email', 'sex', 'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){

        return $this->belongsToMany('App\Role','user_role','id_user','id_role');
    }
    public function amIAdmin() {

        $admin = false;
        foreach($this->roles as $role){
            if($role->name == "Admin"){
                $admin = true;
                break;
            }
        }
        return $admin;
         
    }
    public function amIStudent() {
        //return in_array(1, $this->roles()->pluck('role_id')->all());
        $admin = $this->roles->where('role_id', 1)->first();

        if($admin == 'Admin'){
            return true;

        }else{

            return false;
        }
         
    }
    public function amITeacher() {
        //return in_array(1, $this->roles()->pluck('role_id')->all());
        $admin = $this->roles->where('role_id', 1)->first();

        if($admin == 'Admin'){
            return true;

        }else{

            return false;
        }
         
    }
    public function hasRole($role)
    {
        return User::where('name', $role)->get();
        //return Role::where('name', $role)->where('id_user', $userID)->get();
    }
}
