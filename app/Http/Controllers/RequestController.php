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


    public function index()
    {
        $requests = UserRequest::with('user')->get();
        return view('coordinator.approveEligibility', compact('requests'));
    }

    public function approve(Request $request, $id)
    {
        $userRequest = UserRequest::findOrFail($id);
        $userRequest->update(['status' => 'approved']);

        $user = $userRequest->user;
        if ($user) {
            $user->status = 'Approved';
            $user->save();

            $apiToken = session('api_token');
            $headers = [
                'Authorization' => 'Bearer ' . $apiToken,
            ];

            $response = Http::withHeaders($headers)->withoutVerifying()
                ->get('https://cis-dev.del.ac.id/api/library-api/mahasiswa', [
                    'username' => $user->username,
                ]);

            if ($response->successful()) {
                $studentData = $response->json()['data']['mahasiswa'][0];
                ApprovedStudent::updateOrCreate(
                    ['student_id' => $user->id],
                    [
                        'nim' => $studentData['nim'] ?? null,
                        'batch' => $studentData['angkatan'] ?? null,
                    ]
                );
            } else {
                return back()->with('error', 'Failed to fetch student data from API.');
            }
        }

        return back()->with('success', 'Student approved successfully.');
    }

    public function reject(Request $request, $id)
    {
        $userRequest = UserRequest::findOrFail($id);
        $userRequest->update(['status' => 'rejected', 'review_comments' => $request->input('comments')]);

        $user = $userRequest->user;
        if ($user) {
            $user->status = 'Rejected';
            $user->save();
        }

        return back()->with('success', 'Student rejected successfully.');
    }


}
