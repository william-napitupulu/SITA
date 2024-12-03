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
    Route::get('/eligibility', [EligibilityController::class, 'showForm'])->name('eligibility');
    Route::post('/eligibility', [EligibilityController::class, 'submitForm'])->name('eligibility.submit');

    // Thesis Handbook Route
    Route::get('/thesis-handbook', [ThesisHandbookController::class, 'index'])->name('thesis-handbook');

    // Student Data Routes
    Route::get('/student-data', [StudentController::class, 'index'])->name('student-data');
    Route::get('/get-students/{supervisorId}', [StudentController::class, 'getStudentsBySupervisor'])->name('getStudentsBySupervisor');


   // Student specific routes
   Route::get('/student/dashboard', [UserController::class, 'index'])->middleware('can:isStudent');
    
   // Lecturer specific routes
   Route::get('/lecturer/dashboard', [UserController::class, 'index'])->middleware('can:isCoordinator,lecturer');
   
   // Coordinator specific routes
   Route::get('/coordinator/dashboard', [UserController::class, 'index'])->middleware('can:isCoordinator');

});
