<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        if ($user->role_id !== config('roles.' . $role)) {
            return response()->json([
                'alert' => 'Forbidden Resource',
                'message' => 'You must log in as ' . $role . ' to access this route',
                'data' => $user
            ], 403);
        }

        return $next($request);
    }
}