<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class controllerTest extends Controller
{
    //
    public function index(){
    	//$user = User::find(2);
    	$user = User::find(Auth::id());
    	/*foreach ($user->roles as $rol) {
		    
		}*/
		if($this->isAdmin($user)){
			return view('dashboard',compact('user'));
		}else{
			return view('welcome',compact('user'));

		}
    	
		
    }
    
    public function isAdmin($user){
    	$admin = false;
    	foreach($user->roles as $role){
    		if($role->name == "Admin"){
    			$admin = true;
    			break;
    		}
    	}
    	return $admin;
    }
}
