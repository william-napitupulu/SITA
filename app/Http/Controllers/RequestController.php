<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    // Display form for students
    public function create()
    {
        $request = Request::where('user_id', Auth::id())->latest()->first();
        return view('request.create', compact('request'));
    }

    // Handle form submission
    public function store(HttpRequest $request)
    {
        $validated = $request->validate([
            'criteria' => 'required|array|min:1',
        ]);

        // Check if the student already has a pending request
        $existingRequest = Request::where('user_id', Auth::id())->where('status', 'pending')->first();
        if ($existingRequest) {
            return back()->with('error', 'You already have a pending request.');
        } else {
            // Change the user's status to "Pending"
            $user = Auth::user();
            $user->status = 'Pending';
            $user->save();
        }

    // Create a new request
    Request::create([
        'user_id' => Auth::id(),
        'criteria' => $validated['criteria'],
        'status' => 'pending',
    ]);

    return back()->with('success', 'Your request has been submitted.');
}


    // Display requests for coordinators
    public function index()
    {
        $requests = Request::with('user')->get();
        return view('coordinator.approveEligibility', compact('requests'));
    }

    // Approve a request
    public function approve($id)
    {
        $request = Request::findOrFail($id);
        
        // Update the request status
        $request->update(['status' => 'approved']);
        
        // Update the user's status to 'Approved'
        $user = $request->user;
        if ($user) {
            $user->status = 'Approved';
            $user->save();
        }

        return back()->with('success', 'Request approved.');
    }

    // Reject a request
    public function reject(HttpRequest $request, $id)
    {
        $requestData = Request::findOrFail($id);
        
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

        return back()->with('success', 'Request rejected.');
    }

}
