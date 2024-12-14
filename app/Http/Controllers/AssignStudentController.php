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
        $students = ApprovedStudent::all();

        // Fetch all supervisors (assuming supervisors are identified by their role)
        $supervisors = User::where('role', 'lecturer')->get();

        return view('coordinator.assign-student', compact('students', 'supervisors'));
    }

    // Handle assigning students to supervisors and groups
    public function assign(Request $request)
    {
        $request->validate([
            'supervisor_id' => 'required|exists:users,id',
            'students' => 'required|array|min:1|max:3',    // Maximum of 3 students
            'students.*' => 'exists:approved_students,student_id',
            'groups' => 'array', 
            'groups.*' => 'nullable|string|max:255', // Validate each group name
        ]);

        $supervisorId = $request->input('supervisor_id');
        $studentIds = $request->input('students');
        $groups = $request->input('groups', []);

        foreach ($studentIds as $studentId) {
            $approvedStudent = ApprovedStudent::where('student_id', $studentId)->first();

            if ($approvedStudent) {
                $approvedStudent->update([
                    
                    'supervisor_id' => $supervisorId,
                    'group' => $groups[$studentId] ?? 'Group ' . rand(1, 5), // Use provided group or assign default
                    
                ]);
            }
        }

        return redirect()->route('assign.students')
            ->with('success', 'Students and groups assigned successfully!');
    }

}
