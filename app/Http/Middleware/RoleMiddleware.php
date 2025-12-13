<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Check if user has the required role
        if ($role === 'superadmin' && $user->role !== 'superadmin') {
            // Only superadmin can access superadmin routes
            return response()->view('admin.access-denied', [
                'message' => 'Access Denied: Only superadmin can access this resource.'
            ], 403);
        }
        
        if ($role === 'admin' && !in_array($user->role, ['admin', 'superadmin'])) {
            // Admin routes can be accessed by both admin and superadmin
            return response()->view('admin.access-denied', [
                'message' => 'Access Denied: You need admin privileges to access this resource.'
            ], 403);
        }

        return $next($request);
    }
}