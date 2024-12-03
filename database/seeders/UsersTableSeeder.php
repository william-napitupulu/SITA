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
            'name' => 'William',
            'username' => 'student@del.ac.id',
            'password' => Hash::make('student'),
            'role' => 'student',
        ]);

        // Create lecturers
        User::create([
            'name' => 'Febiola',
            'username' => 'lecturer@del.ac.id',
            'password' => Hash::make('lecturer'),
            'role' => 'lecturer',
        ]);

        // Create coordinators
        User::create([
            'name' => 'Bu Ranti',
            'username' => 'coordinator@del.ac.id',
            'password' => Hash::make('coordinator'),
            'role' => 'coordinator',
        ]);
    }
}
