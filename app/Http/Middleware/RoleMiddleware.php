<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if(!auth()->check()){
        return redirect()->route('login');
        }
        if(auth()->user()->role !== $role){
            return redirect()->route('home')->with('error',"You are not authorized to access this page as a $role");
        }
        return $next($request);

    }
}
