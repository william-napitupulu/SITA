<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |---------------------------------------------------------------------------
    | Login Controller
    |---------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your dashboard screen. It uses a trait to provide
    | the necessary functionality.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the username method to use 'username' instead of 'email'.
     *
     * @return string
     */
    public function username()
    {
        return 'username'; // Use 'username' for authentication
    }

    /**
     * Redirect the user after login based on their role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {

        // Default redirect
        return redirect()->route('dashboard');
    }

    /**
     * Override the loggedOut method to redirect to /dashboard after logout.
     */
    protected function loggedOut(Request $request)
    {
        return redirect('/dashboard');
    }
}
