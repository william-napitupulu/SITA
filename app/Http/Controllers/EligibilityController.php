<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eligibility;


class EligibilityController extends Controller
{

    public function index()
    {
        // Fetch users with eligibility information
        $eligibilities = Eligibility::with('user')->get();
        return view('coordinator.approveEligibility', compact('eligibilities'));
    }


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

    public function approve($id)
    {
        // Approve eligibility for a user
        $eligibility = Eligibility::find($id);
        if ($eligibility) {
            $eligibility->is_eligible = true;
            $eligibility->save();
            return redirect()->route('eligibility.index')->with('success', 'Eligibility Approved');
        }
        return redirect()->route('eligibility.index')->with('error', 'Eligibility not found');
    }

    public function disapprove($id)
    {
        // Disapprove eligibility for a user
        $eligibility = Eligibility::find($id);
        if ($eligibility) {
            $eligibility->is_eligible = false;
            $eligibility->save();
            return redirect()->route('eligibility.index')->with('success', 'Eligibility Disapproved');
        }
        return redirect()->route('eligibility.index')->with('error', 'Eligibility not found');
    }
}
