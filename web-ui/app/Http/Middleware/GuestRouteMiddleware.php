<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $isAuthenticated = $request->query('token') != null; // Check if the user is authenticated
        // Laravel's auth check
        // $request->query('token') != "null" ||
        // dd($isAuthenticated);
        // dd([
        //     'url_token' => $request->query('token'),
        //     'url_token?' =>$request->query('token') != null,
        //     // 'uid' => $request->query('uid'),
        //     // 'uid?' => $request->query('uid') != "null" || $request->query('uid') != null,
        // ]);

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
