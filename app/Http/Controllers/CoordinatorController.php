<?php

namespace App\Http\Controllers;

class CoordinatorController extends Controller
{
    public function index()
    {
        return view('coordinator.projects');
    }
}
