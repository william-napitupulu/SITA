<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {   
        session()->forget('api_token'); // Forget the API token
        session()->forget('user'); 
        
        $response = Http::withOptions(['verify' => false])
        ->asForm()
        ->post('https://cis-dev.del.ac.id/api/jwt-api/do-auth', [
            'username' => 'johannes',
            'password' => 'Del@2022',
        ]);
        

        // Log the API response for debugging purposes
        Log::info('API Response on Login Form Display: ', [$response->json()]);

        
        // If the API request fails, return a failure message
        if (!$response->successful()) {
            
            Log::error('API request failed on login form display', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            // Handle the error or return an error message
            return redirect()->route('login')->withErrors('Unable to authenticate API.');
        }

        

        // If the response is successful, extract the token
        $token = $response->json()['token'];


        // Store the token in the session
        Session::put('api_token', $token);

        // Pass the token to the view if needed
        return view('auth.login', ['api_token' => $token]);
    }


    
}
