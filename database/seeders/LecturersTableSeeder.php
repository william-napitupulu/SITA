<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Lecturer;



class LecturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lecturer::create([
            'pegawai_id' => 397,
            'dosen_id'=> 138,
            'nip' => '0308190348',
            'username'=> '0114129002',
            'password' => Hash::make('lecturer'),
            'role' => 'lecturer',
            'nama' => 'Iustisia Natalia Simbolon, S.Kom., M.T',
            'email' => '-',
            'prodi_id' => 6,
            'prodi' => 'S1 Informatika',
            'jabatan_akademik'=> 'A',
            'jabatan_akademik_desc'=> 'Tenaga Pengajar',
            'jenjang_pendidikan'=> 'Master, ',
            'nidn'=> '0114129002',
            'user_id'=> 3734
        ]);
    }
}
