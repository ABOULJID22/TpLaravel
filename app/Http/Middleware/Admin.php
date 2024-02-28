<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
    if(auth()->user()->isAdmin == 1){
    return $next($request);
    }
    return redirect('home')->with('error','Vous n\'avez pas les droits d\'un administrateur');
    }
}
