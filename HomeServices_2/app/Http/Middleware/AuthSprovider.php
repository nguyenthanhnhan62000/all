<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSprovider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->utype === 'SVP') {
            return $next($request);
        }
        else{
            session()->fluch();
            return redirect()->route('login');
        }
    }
}
