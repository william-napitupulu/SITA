<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\MockObject\Rule\Parameters;

trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);
        

        

        // dd($request);
        // $username = $request->get('username');
        // dd($username);
        

   // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            $user = Auth::user(); 
            $apiToken = session('api_token');
            
            // Ensure API token exists
            if (!$apiToken) {
                return back()->withErrors([
                    'username' => 'API token is required.',
                ]);
            }
        
            if ($user->role === "student") {
                // Assuming 'nim' is a valid attribute in the 'users' table, if not, adjust accordingly
            
                $headers = [
                    'Authorization' => 'Bearer ' . $apiToken,
                ];
        
                

                // Define the API URL correctly
                $response = Http::withHeaders($headers)->withoutVerifying()
                    ->get('https://cis-dev.del.ac.id/api/library-api/mahasiswa', [
                    
                        'username' => $user->username, // Send the username from authenticated user
                    
                    ]);
            

                $user_id = $response['data']['mahasiswa'][0]['user_id'];
                Session::put('user_id', $user_id);

            }

            if ($user->role === "lecturer") {
                // Assuming 'nim' is a valid attribute in the 'users' table, if not, adjust accordingly
            
                $headers = [
                    'Authorization' => 'Bearer ' . $apiToken,
                ];
        
                

                // Define the API URL correctly
                $response = Http::withHeaders($headers)->withoutVerifying()
                    ->get('https://cis-dev.del.ac.id/api/library-api/mahasiswa', [
                    
                        'username' => $user->username, // Send the username from authenticated user
                    
                    ]);
            

                $user_id = $response['data']['mahasiswa'][0]['user_id'];
                Session::put('user_id', $user_id);

            }

            if ($user->role === "coordinator") {
                // Assuming 'nim' is a valid attribute in the 'users' table, if not, adjust accordingly
            
                $headers = [
                    'Authorization' => 'Bearer ' . $apiToken,
                ];
        
                

                // Define the API URL correctly
                $response = Http::withHeaders($headers)->withoutVerifying()
                    ->get('https://cis-dev.del.ac.id/api/library-api/dosen?nama=Ius&nidn=&nip=&userid=&pegawaiid=&dosenid=&limit=', [
                    
                        'nip' => $user->username, // Send the username from authenticated user
                    
                    ]);
            

                $user_id = $response['data']['dosen'][0]['user_id'];
                Session::put('user_id', $user_id);

            }            
            
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
