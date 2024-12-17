<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class EligibilityController extends Controller
{
    public function showForm(Request $request)
    {
        Log::info('Request ID Number: ' . $request->id_number);
        
        $eligibility = UserRequest::where('user_id', session('user_id'))->first();

        $requestCriteria = null;
        if ($eligibility) {
            // Split the comma-separated string into an array
            $requestCriteria = explode(',', $eligibility['criteria']);
        }
        
        // Check if the 'rejected_shown' session key exists, and forget it if it does
        if (session()->has('rejected_shown')) {
            session()->forget('rejected_shown');
        }

        // Pass the array to the Blade view
        return view('student.eligibility', compact('requestCriteria'));
    }



    public function updateStatus(Request $request)
    {
        $user = Auth::user();
        UserRequest::where('request_id', session('user_id'))->delete();        $user->status = 'Not Approved'; // Update the status value
        $user->save(); // Save the changes to the database

        return back()->with('success', 'Status updated successfully.');
    }
    
    public function resetForm()
    {
        $user = Auth::user();
        
        if ($user->status === 'Rejected') {
            
            // Update status to "Not Approved"
            $user->update(['status' => 'Not Approved']);
        }
        dd(session('user_id'));
        UserRequest::where('request_id', session('user_id'))->delete();


        return view('student.eligibility');
    }

}
