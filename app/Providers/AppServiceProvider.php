<?php

namespace App\Services;


use App\Services\ApiAuthService;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    public function boot(ApiAuthService $apiAuthService)
    {
        // Check if the token is already stored in the session, and if not, log in to the API
        if (!$apiAuthService->hasToken()) {
            $apiAuthService->login(); // This will authenticate and store the token in the session
        }
    }
}
