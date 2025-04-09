<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestRouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $guestRoutes = [
            '/all-event',
            '/concert',
            '/conference',
            '/sport',
            '/about',
            '/sell-your-ticket',
            '/upcoming-event',
            '/most-popular-event',
            '/event-detail',
            '/help-center',
        ];

        $currentPath = $request->path();
        $isAuthenticated = $request->all(); // Check if the user is authenticated
        // Laravel's auth check

        // dd($request->all());

        // If authenticated, allow all routes
        if ($isAuthenticated) {
            return $next($request);
        }

        // If in guest routes, allow access
        if (in_array('/' . $currentPath, $guestRoutes)) {
            return $next($request);
        }

        // For non-guest routes (including /user-profile), redirect to unauthorized
        return redirect('/login');
    }
}