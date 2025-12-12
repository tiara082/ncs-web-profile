<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login');
        }

        $admin = Auth::guard('web')->user();

        // If no specific roles required, just check if admin is authenticated
        if (empty($roles)) {
            return $next($request);
        }

        // Check if admin has any of the required roles
        foreach ($roles as $role) {
            if ($admin->role === $role) {
                return $next($request);
            }
        }

        // If admin doesn't have required role, redirect with error
        return redirect()->route('admins.index')
            ->with('error', 'You do not have permission to access this resource.');
    }
}
