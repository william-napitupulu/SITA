<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminOrEditor
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Check if user is authenticated and has 'Admin' or 'Editor' role
        if ($user && in_array($user->role, ['Admin', 'Editor'])) {
            return $next($request);
        }

        // Redirect if unauthorized
        return redirect()->route('dashboard')->withErrors('Access denied');
    }
}
