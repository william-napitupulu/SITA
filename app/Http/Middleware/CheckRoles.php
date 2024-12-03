<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoles
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        if (!$user || !in_array($user->role, $roles)) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized');
        }
        return $next($request);
    }
}
