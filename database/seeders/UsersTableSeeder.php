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
            'name' => 'Guntur Augustin Sinaga',
            'username' => 'ifs20006',
            'password' => Hash::make('student'),
            'role' => 'student',
            'status' => 'Not Approved'

        ]);

        // Create lecturers
        User::create([
            'name' => 'Zan Peter Silaen',
            'username' => 'ifs20022',
            'password' => Hash::make('lecturer'),
            'role' => 'lecturer',
            'status' => ''
        ]);

        // Create coordinators
        User::create([
            'name' => 'Iustisia Natalia Simbolon, S.Kom., M.T.',
            'username' => '0308190348',
            'password' => Hash::make('coordinator'),
            'role' => 'coordinator',
            'status' => ''
        ]);
    }
}
