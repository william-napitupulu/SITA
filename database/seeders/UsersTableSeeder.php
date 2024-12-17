<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Aditya Pratama Gultom',
            'username' => 'ifs20007',
            'password' => Hash::make('student'),
            'role' => 'student',
            'status' => 'Not Approved'

        ]);

        User::create([
            'name' => 'Amelia Agustina Hutajulu',
            'username' => 'ifs20044',
            'password' => Hash::make('student'),
            'role' => 'student',
            'status' => 'Not Approved'

        ]);

        User::create([
            'name' => 'Anton Roycar Nababan',
            'username' => 'ifs20025',
            'password' => Hash::make('student'),
            'role' => 'student',
            'status' => 'Not Approved'

        ]);

        User::create([
            'name' => 'Bryand Christofer Sinaga',
            'username' => 'ifs20027',
            'password' => Hash::make('student'),
            'role' => 'student',
            'status' => 'Not Approved'

        ]);

        User::create([
            'name' => 'Chantika Nadya Serebella Pardosi',
            'username' => 'ifs20013',
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

        User::create([
            'name' => 'Roosen Gabriel Manurung',
            'username' => 'ifs20020',
            'password' => Hash::make('lecturer'),
            'role' => 'lecturer',
            'status' => ''
        ]);

        User::create([
            'name' => 'Guntur Augustin Sinaga',
            'username' => 'ifs20006',
            'password' => Hash::make('lecturer'),
            'role' => 'lecturer',
            'status' => ''
        ]);

        User::create([
            'name' => 'Abdullah Ubaid',
            'username' => 'ifs18005',
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
