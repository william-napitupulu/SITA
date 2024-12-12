<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\ApprovedStudent;

use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    // Display form for students
    public function create()
    {
        $request = UserRequest::where('user_id', Auth::id())->latest()->first();
        return view('request.create', compact('request'));
    }

    public function store(Request $request)
{
    // Validate the form data
    $validated = $request->validate([
        'criteria' => 'required|array|min:1',  // Ensure at least one checkbox is selected
    ]);

    // Check if the student already has a pending request
    $existingRequest = UserRequest::where('user_id', Auth::id())->where('status', 'pending')->first();
    if ($existingRequest) {
        return back()->with('error', 'You already have a pending request.');
    }

    // Change the user's status to "Pending"
    $user = Auth::user();
    $user->status = 'Pending';
    $user->save();

    // Create a new request
    $request = new UserRequest();
    $request->user_id = Auth::id();
    $request->request_id = session('user_id');
    $request->criteria = implode(',', $validated['criteria']);  // Save criteria as a comma-separated string
    $request->status = 'pending';
    $request->save();


    // Redirect or return success message
    return back()->with('success', 'Your request has been submitted.');
}


    // Display requests for coordinators
    public function index()
    {
        $requests = UserRequest::with('user')->get();
        return view('coordinator.approveEligibility', compact('requests'));
    }

    // Approve a request
    public function approve($id)
    {
        $request = UserRequest::findOrFail($id);

        // Update the request status
        $request->update(['status' => 'approved']);

        // Update the user's status to 'Approved'
        $user = $request->user; // Assuming the user relationship exists
        if ($user) {
            $user->status = 'Approved';
            $user->save();


            $apiToken = session('api_token');


            $headers = [
                'Authorization' => 'Bearer ' . $apiToken,
            ];

         

            $response = Http::withHeaders($headers)->withoutVerifying()
                ->get('https://cis-dev.del.ac.id/api/library-api/mahasiswa', [
                    'user_id' => $user->id, // Send the user_id from the authenticated user
                ]);


            if ($response->successful()) {
                $studentData = $response->json();

                // Add the student to the approved_students table
                ApprovedStudent::create([
                    'student_id' => $user->id,
                    'nim' => $studentData['nim'] ?? null, // Store NIM from API
                    'name' => $studentData['nama'] ?? $user->name, // Use API name if available, fallback to user name
                    'email' => $studentData['email'] ?? $user->email, // Use API email if available
                    'prodi' => $studentData['prodi_name'] ?? null, // Store program name
                    'angkatan' => $studentData['angkatan'] ?? null, // Store batch year
                    'fakultas' => $studentData['fakultas'] ?? null, // Store faculty
                ]);
            } else {
                return back()->with('error', 'Failed to fetch student data from API.');
            }
        }

        return back()->with('success', 'Student approved and added to the approved students list.');
    }


    // Reject a request
    public function reject(Request $request, $id)
    {
        $requestData = UserRequest::findOrFail($id);
        
        // Update the request status and add review comments
        $requestData->update([
            'status' => 'rejected',
            'review_comments' => $request->input('comments'),
        ]);

        // Update the user's status to 'Rejected'
        $user = $requestData->user;
        if ($user) {
            $user->status = 'Rejected';
            $user->save();
        }

        return back()->with('success', 'UserRequest rejected.');
    }

}
