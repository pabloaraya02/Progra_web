<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        //Auth::User
        /*if (! $request->user()->hasRole($role)) {
            // Redirect...
        }*/
  /*      if (!$role=1)) {
            return redirect('home');
        }

*/
       /* If(!Auth::user()->hasRole($role)){

            return redirect('/home');
        }
        return $next($request);*/
        /*$user = Auth::user()->find(Auth::id());
        If(!$this->isAdmin($user)){
            return redirect('/home');
        }
        return $next($request);*/

        If(!Auth::user()->amIAdmin()){
            return redirect('/home');
        }
        return $next($request);
    }


    /*protected function isAdmin($user){
        $admin = false;
        foreach($user->roles as $role){
            if($role->name == "Admin"){
                $admin = true;
                break;
            }
        }
        return $admin;
    }*/
}
