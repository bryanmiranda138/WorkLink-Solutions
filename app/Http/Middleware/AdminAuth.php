<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth()->user()->type == 1 || Auth()->user()->type == 2){ // admin = 1 superAdmin = 2
            return $next($request);
        }else{
            return redirect()->route('login')->with('error', 'You do not have permission to access this page !');
        }
    }
}
