<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        
        return view('lecturer.academic-year');
    }
}
