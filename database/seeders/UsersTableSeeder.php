<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        
        // Create students
        User::create([
            'name' => 'John Doe',
            'username' => 'student@example.com',
            'password' => Hash::make('student'),
            'role' => 'student',
        ]);

        // Create lecturers
        User::create([
            'name' => 'Jane Doe',
            'username' => 'lecturer@example.com',
            'password' => Hash::make('lecturer'),
            'role' => 'lecturer',
        ]);

        // Create coordinators
        User::create([
            'name' => 'Coordinator One',
            'username' => 'coordinator@example.com',
            'password' => Hash::make('coordinator'),
            'role' => 'coordinator',
        ]);
    }
}
