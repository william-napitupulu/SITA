<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EligibilityController extends Controller
{
    public function showForm()
    {
        return view('student.eligibility');
    }

    public function submitForm(Request $request)
    {
        // Handle the form submission logic, like validating and saving data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:20',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
            // Add other fields validation
        ]);

        // Process the data, e.g., save to database or send email
        // For now, just return a success message
        return redirect()->route('eligibility.form')->with('success', 'Form submitted successfully!');
    }
}
