<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create students
        Student::create([
            'dim_id' => 1111,
            'user_id' => 1111,
            'username' => 'ifs22010',
            'password' => Hash::make('student'),
            'role' => 'student',
            'nim' => '11S22010',
            'name' => 'William Napitupulu',
            'email' => 'ifs22010@students.del.ac.id',
            'prodi_id' => 6,
            'prodi_name' => 'S1 Informatika',
            'fakultas' => 'Informatika dan Teknik Elektro',
            'angkatan' => '2022',
            'status' => 'Aktif',
            'asrama' => '',
            'supervisor' => '',
    
        ]);
    }
}
