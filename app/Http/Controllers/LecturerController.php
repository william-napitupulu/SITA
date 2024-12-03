<?php

namespace App\Http\Controllers;

class LecturerController extends Controller
{
    public function index()
    {
        return view('lecturer.courses');
    }
}
