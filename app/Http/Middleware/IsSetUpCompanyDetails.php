<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSetUpCompanyDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ): Response
    {
      
            if(!auth()->user()->company && !$request->routeIs('employer.setup-company','employer.setup-company.post')){
                return redirect()->route('employer.setup-company')->with('error',"Company details not setup yet");
            }
            else if(auth()->user()->company && $request->routeIs('employer.setup-company')){
                return redirect()->route('employer.dashboard')->with('error',"Company details already setup");
            }
        
        return $next($request);
    }
}
