<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Define admin emails
        $adminEmails = [
            'admin@hotel.com',
            'admin@admin.com',
            'hotel@admin.com',
            // Add more admin emails as needed
        ];

        // Check if the authenticated user's email is in the admin list
        if (!in_array(Auth::user()->email, $adminEmails)) {
            // Redirect non-admin users to homepage with error message
            return redirect('/')->with('error', 'Access denied. Admin access required.');
        }

        return $next($request);
    }
}
