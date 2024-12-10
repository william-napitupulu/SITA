<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Coordinator;


class CoordinatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coordinator::create([
            'pegawai_id' => 122,
            'dosen_id'=> 62,
            'nip'=> '0309130087',
            'username' => '0927028002',
            'password' => Hash::make('coordinator'),
            'role' => 'coordinator',
            'nama'=> 'Arie Satia Dharma, S.T, M.Kom.',
            'email'=> 'ariesatia@gmail.com; ariesatia@del.ac.id',
            'prodi_id'=> 6,
            'prodi'=> 'S1 Informatika',
            'jabatan_akademik'=> 'C',
            'jabatan_akademik_desc'=> 'Lektor',
            'jenjang_pendidikan'=> 'Sarjana, Master, ',
            'nidn'=> '0927028002',
            'user_id'=> 1478,
        ]);
    }
}
