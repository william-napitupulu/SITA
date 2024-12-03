<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ApiAuthService
{
    // Define your credentials for API login
    protected $username = 'johannes';
    protected $password = 'Del@2022';
    protected $apiUrl = 'https://cis-dev.del.ac.id/jwt-api/do-auth';

    // Log in to the API and store the token in the session
    public function login()
    {
        // Send POST request to authenticate with the API and get the token
        $response = Http::post($this->apiUrl, [
            'username' => $this->username,
            'password' => $this->password
        ]);

        dd($response->json());  // Debug the response to see if the token is present


        if ($response->successful()) {
            $responseBody = $response->json();

            // Check if the response contains a valid token
            if (isset($responseBody['token'])) {
                // Store the token in the session for later use
                Session::put('api_token', $responseBody['token']);
                Log::info('API Token obtained and stored in session.');
            } else {
                // Handle token retrieval failure
                Log::error('Failed to retrieve API token.');
            }
        } else {
            // Handle failed API login (invalid credentials or other issues)
            Log::error('API login failed: ' . $response->body());
        }
    }

    // Get the API token from the session
    public function getToken()
    {
        return Session::get('api_token');
    }

    // Check if the token exists in the session
    public function hasToken()
    {
        return Session::has('api_token');
    }

    // Handle token expiry by logging out
    public function logout()
    {
        Session::forget('api_token');
        Log::info('API Token removed from session.');
    }
}
