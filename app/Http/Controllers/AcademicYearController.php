<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    // Display the list of academic years
    public function index()
    {
        // Example list of years
        $years = ['2017/2018', '2018/2019', '2019/2020', '2020/2021', '2021/2022', '2022/2023', '2023/2024', '2024/2025'];
        return view('lecturer.academic-years', compact('years'));
    }

    // Display the details for a specific year
    public function details($year)
    {
        // Example students data for the selected year
        $filteredStudents = [
            ['batch' => 2017, 'nim' => '11122001', 'name' => 'Andi Saputra', 'supervisor' => 'Dr. John Doe'],
            ['batch' => 2017, 'nim' => '11122002', 'name' => 'Budi Santoso', 'supervisor' => 'Dr. Jane Smith'],
            ['batch' => 2018, 'nim' => '11122003', 'name' => 'Citra Dewi', 'supervisor' => 'Dr. John Doe'],
            ['batch' => 2018, 'nim' => '11122004', 'name' => 'Doni Pratama', 'supervisor' => 'Dr. Emily Brown'],
        ];
        


        // Filter students by year if necessary (replace this with your database query)
        return view('lecturer.academic-years-details', compact('year', 'filteredStudents'));
    }
}
