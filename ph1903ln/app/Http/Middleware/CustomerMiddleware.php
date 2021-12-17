<?php

namespace App\Http\Middleware;


use Closure;
use Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CustomerMiddleware
{   
    private $rus;
    public function __construct()
    {
        # code...
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next, $guard = 'cus')
    {

            if (Auth::guard($guard)->check()) {

                return $next($request);
                
            }

        return redirect()->route('home');
    }
}
