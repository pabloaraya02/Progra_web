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

    public function matriculas(){
        return $this->hasMany('App\Enrollment','id_user','id_user');
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
        $admin = false;
        foreach($this->roles as $role){
            if($role->name == "Student"){
                $admin = true;
                break;
            }
        }
        return $admin;
         
    }
    public function amITeacher() {

        $admin = false;
        foreach($this->roles as $role){
            if($role->name == "Teacher"){
                $admin = true;
                break;
            }
        }
        return $admin;
         
    }
    public function hasRole($role)
    {
        return User::where('name', $role)->get();
        //return Role::where('name', $role)->where('id_user', $userID)->get();
    }
  /*  public function setPasswordAttribute($password)
    {   
        
        if (Hash::check('plain-text', $password)) {
    // The passwords match...
            $this->attributes['password'] = bcrypt($password);
        }
    }
*/
    public function setPasswordAttribute($pass){

        $this->attributes['password'] = bcrypt($pass);




        

    }
}
