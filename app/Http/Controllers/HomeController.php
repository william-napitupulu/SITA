<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     // Disable the auth middleware if it's no longer needed
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('dashboard');
    }
}
