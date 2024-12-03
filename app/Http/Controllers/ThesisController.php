<?php

namespace App\Http\Controllers;

use App\Models\Progress; // If you're using progress-related data for the thesis
use Illuminate\Http\Request;

class ThesisController extends Controller
{
    public function showThesisPage1()
    {
        // Example data for the thesis page, you could fetch this from the database later
        $thesis = [
            'title' => 'Thesis on Machine Learning in Healthcare',
            'semester' => 'First Semester',
            'download_link' => '/path-to-thesis-file.pdf',
        ];

        return view('student.thesis.index1', compact('thesis'));
    }

    public function showThesisPage2()
    {
        // Example data for the thesis page, you could fetch this from the database later
        $thesis = [
            'title' => 'Thesis on Machine Learning in Healthcare',
            'semester' => 'First Semester',
            'download_link' => '/path-to-thesis-file.pdf',
        ];

        return view('student.thesis.index2', compact('thesis'));
    }
}
