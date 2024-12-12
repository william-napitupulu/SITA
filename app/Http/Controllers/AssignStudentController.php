<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovedStudent;
use App\Models\User;

class AssignStudentController extends Controller
{
    // Display the Assign Student page
    public function index()
    {
        // Fetch approved students with their associated supervisors and groups
        $students = ApprovedStudent::with('student', 'supervisor')->get();

        // Fetch all supervisors (assuming supervisors are identified by their role)
        $supervisors = User::where('role', 'lecturer')->get();

        return view('coordinator.assign-student', compact('students', 'supervisors'));
    }

    // Handle assigning students to supervisors and groups
    public function assign(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'supervisor_id' => 'required|exists:users,id',  // Supervisor must exist in the users table
            'students' => 'required|array|min:1|max:3',    // Must select between 1 and 3 students
            'students.*' => 'exists:approved_students,student_id', // Validate that each student exists in the approved_students table
        ]);

        $supervisorId = $request->input('supervisor_id');
        $studentIds = $request->input('students');

        foreach ($studentIds as $studentId) {
            $approvedStudent = ApprovedStudent::where('student_id', $studentId)->first();

            if ($approvedStudent) {
                $approvedStudent->update([
                    'supervisor_id' => $supervisorId,
                    'group' => 'Group ' . ($approvedStudent->group ?? rand(1, 5)), // Assign or retain group
                ]);
            }
        }

        return redirect()->route('assign.students')
            ->with('success', 'Students assigned to supervisor successfully!');
    }
}
