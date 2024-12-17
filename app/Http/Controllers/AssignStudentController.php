<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        // dd($request);

        // $request->validate([
        //     'students' => 'required|array|min:1|max:3',    // Maximum of 3 students
        //     'students.*' => 'exists:approved_students,student_id',
        //     'groups' => 'array', 
        //     'groups.*' => 'nullable|string|max:255', // Validate each group name
        // ]);


        $supervisorId = $request->input('supervisor_id');
        $studentIds = $request->input('students');
        $groups = $request->input('groups', []);
        $value = Session::get('group_count'); 

        // dd($groups);
        foreach ($studentIds as $studentId) {
            $approvedStudent = ApprovedStudent::where('id', $studentId)->first();

            if ($approvedStudent) {
                $approvedStudent->update([
                    
                    'supervisor_id' => $supervisorId,
                    'group' => $groups[$studentId] ?? 'Group ' . $value, // Use provided group or assign default
                    
                ]);
                Session::put('group_count', $value + 1);


            } 
            
        }

        

        return redirect()->route('assign.students')->with('success', 'Students and groups assigned successfully!');
    }

    public function saveGroupNames(Request $request)
    {
        $groups = $request->input('groups', []);
        foreach ($groups as $studentId => $groupName) {
            ApprovedStudent::where('id', $studentId)->update(['group' => $groupName]);
        }
        return redirect()->back()->with('success', 'Group names saved successfully!');
    }

}
