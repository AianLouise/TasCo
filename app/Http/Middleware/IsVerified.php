<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is verified
        if (auth()->check() && auth()->user()->is_verified == 1) {
            return $next($request);
        }

        // Redirect or handle the case when the user is not verified
        return redirect('/')->with('error', 'You are not verified.');
    }
}
