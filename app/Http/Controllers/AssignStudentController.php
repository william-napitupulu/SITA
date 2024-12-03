<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignStudentController extends Controller
{
    public function index()
    {
        // Use a dummy collection of students for now
        $students = collect([
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
            ['id' => 4, 'name' => 'Bob Brown', 'email' => 'bob@example.com'],
            // Add more students as needed
        ]);

        // Simulate pagination by using slice
        $currentPage = 1;  // In real case, this will come from the query parameter
        $perPage = 10;     // Number of students per page
        $students = $students->slice(($currentPage - 1) * $perPage, $perPage);

        return view('coordinator.assign-student', compact('students'));
    }

    public function assign(Request $request)
    {
        // Ensure the request contains students
        $this->validate($request, [
            'students' => 'required|array|min:3',
        ]);

        // Simulate grouping students in sets of 3
        $studentsToAssign = $request->input('students');
        
        $groups = array_chunk($studentsToAssign, 3);  // Divide students into groups of 3

        // You can now store the groups in your database if needed
        // Example: Group::create(['students' => json_encode($groups)]);

        return redirect()->route('assign.student')->with('success', 'Students assigned to groups successfully!');
    }


}
