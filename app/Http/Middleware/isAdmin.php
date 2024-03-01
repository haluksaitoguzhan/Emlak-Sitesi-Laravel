<?php

namespace App\Http\Middleware;

//use Illuminate\Support\Facades\Auth;    Bunu kulllanmayı unutmaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
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


        if(Auth::guard('admin')->check()){
            return $next($request);
        }
        return redirect()->route('admin_giris');
        
        //if(!Auth::check()){
        //    return redirect()->route('admin_giris');
        //}

        //return $next($request);
    }
}
