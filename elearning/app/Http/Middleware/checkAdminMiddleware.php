<?php

namespace App\Http\Middleware;

use Closure;

class checkAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Auth::User
        /*if (! $request->user()->hasRole($role)) {
            // Redirect...
        }*/
  /*      if (!$role=1)) {
            return redirect('home');
        }

*/
        If(!Auth::user()->isAdmin()){

            return redirect('/home');
        }
        return $next($request);
        return $next($request);
    }
}
