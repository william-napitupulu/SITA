<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\EligibilityController;
use App\Http\Controllers\ThesisHandbookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssignStudentController;
use App\Http\Controllers\RequestController;




// Disable default Laravel authentication routes
Auth::routes(['register' => false, 'login' => false]);

// Custom Login Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');


// Authenticated Routes (protected by middleware)
Route::middleware('auth')->group(function () {

    // Default Home Route (or dashboard)
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/profile/settings', [ProfileController::class, 'update'])->name('profile.update');

    // Thesis Routes
    Route::get('/thesis1', [ThesisController::class, 'showThesisPage1'])->name('thesis1');
    Route::get('/thesis2', [ThesisController::class, 'showThesisPage2'])->name('thesis2');

    // Eligibility Routes
    Route::get('/eligibility', [EligibilityController::class, 'showForm'])->name('eligibilityForm');
    Route::post('/reset-form', [EligibilityController::class, 'resetForm'])->name('reset.form');
    Route::get('/update-status', [EligibilityController::class, 'updateStatus'])->name('update.status');

    
    Route::get('/eligibility/create', [RequestController::class, 'create'])->name('request.create');
    Route::post('/eligibility/store', [RequestController::class, 'store'])->name('request.store');


    Route::get('/eligibility-approve', [RequestController::class, 'index'])->name('request.index');
    Route::post('/eligibility/approve/{id}', [RequestController::class, 'approve'])->name('request.approve');
    Route::post('/eligibility/reject/{id}', [RequestController::class, 'reject'])->name('request.reject');
    


    // Thesis Handbook Route
    Route::get('/thesis-handbook', [ThesisHandbookController::class, 'index'])->name('thesis-handbook');

    // Student Data Routes
    Route::get('/student-data', [StudentController::class, 'index'])->name('student-data');
    Route::get('/get-students/{supervisorId}', [StudentController::class, 'getStudentsBySupervisor'])->name('getStudentsBySupervisor');


    // Asign Student Routes
    Route::get('/assign-students', [AssignStudentController::class, 'index'])->name('assign.students');
    Route::post('/assign-students', [AssignStudentController::class, 'assign'])->name('assign.students.submit');


    Route::get('download-pdf', function () {
        $filePath = public_path('storage/files/06._Pedoman_Seminar_Proposal_S1IF.pdf');
        return response()->download($filePath);
    });
//    // Student specific routes
//    Route::get('/student/dashboard', [UserController::class, 'index'])->middleware('can:isStudent');
    
//    // Lecturer specific routes
//    Route::get('/lecturer/dashboard', [UserController::class, 'index'])->middleware('can:isLecturerOrCoordinator');
   
//    // Coordinator specific routes
//    Route::get('/coordinator/dashboard', [UserController::class, 'index'])->middleware('can:isCoordinator');

});
