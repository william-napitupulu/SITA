<?php

namespace App\Http\Controllers;

use App\Models\Eligibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EligibilityController extends Controller
{
    public function showForm(Request $request)
    {
        // Find the eligibility form for the current student (based on their ID number)
        $eligibility = Eligibility::where('id_number', $request->id_number)->first();


        // Clear the session flag if the page is refreshed
        if (session()->has('rejected_shown')) {
            session()->forget('rejected_shown');
        }

        // Pass the eligibility data to the view
        return view('student.eligibility', compact('eligibility'));
    }

    


    public function submitForm(Request $request)
    {
        // Check if the student has already submitted the form and is in 'waiting' state
        $existingEligibility = Eligibility::where('id_number', $request->id_number)->first();

        if ($existingEligibility && $existingEligibility->eligibility_status == 'waiting') {
            return redirect()->route('student.eligibility')->with('error', 'You have already submitted your eligibility form and are waiting for approval.');
        }



        // Validate the form
        $validated = [
            'name' => 'John Doe',
            'id_number' => '12345',
            'email' => 'john@example.com',
            'date_of_birth' => '2000-01-01',
            'phone_number' => '123456789',
            'eligibility_status' => 'eligible',
            'criteria' => ['criteria_1', 'criteria_2'],
            'comments' => 'Test comment',
        ];
    
        

        // Store the eligibility form data with the status as 'waiting'
        $eligibility = Eligibility::create([
            'name' => $validated['name'],
            'id_number' => $validated['id_number'],
            'email' => $validated['email'],
            'date_of_birth' => $validated['date_of_birth'],
            'phone_number' => $validated['phone_number'],
            'eligibility_status' => 'waiting', // Set the status to 'waiting' by default
            'comments' => $request->input('comments', null),
            'criteria' => json_encode($validated['criteria']),
        ]);

        // Redirect back with success message
        return redirect()->route('student.eligibility')->with('success', 'Eligibility form submitted successfully. You are now in a pending state.');
    }

}
