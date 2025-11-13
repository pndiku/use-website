<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // Check if user is authenticated and has admin role
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to access this area.');
        }

        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access. Admin privileges required.');
        }

        return $next($request);
    }
}
