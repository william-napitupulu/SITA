<?php

namespace App\Http\Controllers;
use App\Models\Student;

use App\Models\ApprovedStudent;
use App\Models\User;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
         // Fetch approved students with their associated supervisors and groups
         $students = ApprovedStudent::all();

         // Fetch all supervisors (assuming supervisors are identified by their role)
         $supervisors = User::where('role', 'lecturer')->get();
         
        return view('lecturer.studentData', compact('students', 'supervisors'));

    }

    public function getStudentsBySupervisor($supervisorId)
    {
        // Fetch students by supervisor ID
        $students = Student::where('supervisor_id', $supervisorId)->get();

        // Return a Blade view with the student data
        return view('partials.student_table', compact('students'));
    }

    public function store(Request $request)
    {
        // Validate the input data for creating a student entry
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|unique:students,nim',
            'program' => 'required|string',
            'status' => 'required|string',
        ]);

        // Save to the database (mock implementation for now)
        // Redirect with a success message
        return redirect()->route('student.index')->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        // Retrieve the student data (mock data for now)
        $student = ['id' => $id, 'name' => 'John Doe', 'nim' => '123456789', 'program' => 'Computer Science', 'status' => 'Active'];

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the student data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required',
            'program' => 'required|string',
            'status' => 'required|string',
        ]);

        // In a real application, update the data in the database

        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        // Delete the student entry
        // In a real application, delete the student from the database

        return redirect()->route('student.index')->with('success', 'Student deleted successfully!');
    }
}
