<?php

namespace BTNewsApp\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AcceptJsonHeader
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        
        return $next($request);
    }
}
