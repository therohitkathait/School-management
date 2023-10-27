<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the 'user_id' session variable is set
        if ($request->session()->has('user_id')) {
            return $next($request); // User is authenticated, allow access to the route.
        }

        return redirect('/'); // User is not authenticated, redirect to the login page.
    }
}