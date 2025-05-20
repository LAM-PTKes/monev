<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();
        // dd($user);
        // Check if user is authenticated
        if (!$user) {
            return abort(403, 'Access Denied: User not authenticated');
        }

        // Check if the user has the required role
        $userRoleNames = $user->roles->pluck('role_name')->toArray();
        foreach ($roles as $role) {
            if (in_array($role, $userRoleNames)) {
                return $next($request);
            }
        }

        // Log denied access if needed
        Log::warning('Access denied', ['user_id' => $user->id, 'roles' => $userRoleNames]);

        // Return appropriate response based on request type
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Access Denied: Insufficient permissions'], 403);
        }

        return abort(403, 'Access Denied: Insufficient permissionsaaa');
    }
}
