<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;

class CheckApiToken
{
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the token from session
        $apiToken = Session::get('api_token');

        // If the token doesn't exist or is invalid, redirect to login
        if (!$apiToken || !Http::withToken($apiToken)->get('https://cis-dev.del.ac.id/api/some-validate-endpoint')->successful()) {
            return redirect()->route('login')->with('error', 'Session expired or invalid. Please log in again.');
        }

        return $next($request);
    }
}
