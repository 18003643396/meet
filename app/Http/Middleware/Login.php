<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
       $cid = session('cid');
        if($cid){
            return $next($request);

        } else {

            return redirect('/admin/login');
        }
    }
}
