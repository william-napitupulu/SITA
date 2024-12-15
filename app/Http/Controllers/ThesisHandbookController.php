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

    public function downloadBook()
{
    $filePath = public_path('storage/files/Buku Pedoman TA S1IF-draft-v3.pdf');
    
    if (file_exists($filePath)) {
        return response()->download($filePath)->header('Location', '/thesis-handbook?success=1');
    } else {
        return back()->with('error', 'File not found.');
    }
}

}