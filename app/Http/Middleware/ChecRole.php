<?php

namespace App\Http\Middleware;
use auth;
use Closure;

class ChecRole
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
       // $data=$request->route()->parameters();
        if (auth::user()->name == "Lam Thai Gia Huy") {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
        return redirect('/')->with('status', 'Not Authorized!');
    }
   

}
