<?php

namespace BTNewsApp\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->isAdmin == 1){
            return $next($request);
          } else {
            return response()->json([
              'status' => false,
              'message' => 'Unauthorized!',
            ],401);
          }
    }
}
