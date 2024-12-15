<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovedStudent;
use App\Models\User;


class AcademicYearController extends Controller
{
    // Display the list of academic years
    public function index()
    {
        // Example list of years
        $years = ['2017/2018', '2018/2019', '2019/2020', '2020/2021', '2021/2022', '2022/2023', '2023/2024', '2024/2025'];
        $batches = [2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024];
        return view('lecturer.academic-years', compact('years', 'batches'));
    }

    // Display the details for a specific year
    public function details($year)
    {
        
        $students = ApprovedStudent::where('batch', $year)->get();
        // Fetch all supervisors (assuming supervisors are identified by their role)
        $supervisors = User::where('role', 'lecturer')->get();



        // Filter students by year if necessary (replace this with your database query)
        return view('lecturer.academic-years-details', compact('year', 'students', 'supervisors'));
    }
}
