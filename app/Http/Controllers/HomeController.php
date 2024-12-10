<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\Visitor;
use Carbon\Carbon;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     // Disable the auth middleware if it's no longer needed
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // API token from session
        $apiToken = session('api_token');
        
        // Ensure API token exists
        if (!$apiToken) {
            return back()->withErrors([
                'username' => 'API token is required.',
            ]);
        }
        
        $headers = [
            'Authorization' => 'Bearer ' . $apiToken,
        ];

        // Fetch the data for active students (filtered by status "Aktif" and year 2020)
        $studentsResponse = Http::withHeaders($headers)->withoutVerifying()
        ->get('https://cis-dev.del.ac.id/api/library-api/mahasiswa', [
            'status' => 'Aktif', // Filter by active status
            'angkatan' => '2020',
        ]);
        
        // Fetch the data for active lecturers
        $lecturersResponse = Http::withHeaders($headers)->withoutVerifying()
        ->get('https://cis-dev.del.ac.id/api/library-api/dosen');

        // Get the count for active students and lecturers
        $activeStudentsCount = count($studentsResponse->json()['data']['mahasiswa']);
        $activeLecturersCount = count($lecturersResponse->json()['data']['dosen']);

        // Initialize an array to hold the passing students per year (2013-2020)
        $passingStudentsPerYear = [];
        
        // Fetch data for students who have passed (status = "Lulus") for each year (2013-2020)
        for ($year = 2013; $year <= 2020; $year++) {
            $response = Http::withHeaders($headers)->withoutVerifying()
            ->get('https://cis-dev.del.ac.id/api/library-api/mahasiswa', [
                'status' => 'Lulus', // Filter by graduated status
                'angkatan' => $year,  // Filter by graduation year (angkatan)
                'limit' => 1000        // Set a high limit to retrieve all students
            ]);

            // Count the students in the response for each year and store it in the array
            $passingStudentsPerYear[$year] = count($response->json()['data']['mahasiswa']);
        }

        // Pass the data to the view
        return view('dashboard', compact('activeStudentsCount', 'activeLecturersCount', 'passingStudentsPerYear'));
    }
}
