<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThesisHandbookController extends Controller
{
    public function index()
    {
        // Return the view for the Thesis Handbook page
        return view('student.thesisHandbook');
    }
}