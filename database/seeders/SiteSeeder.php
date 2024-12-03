<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Site;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sites = [
            ['url' => 'http://127.0.0.1:8000/welcome', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/berita-artikel', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/galeri', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/arsip', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/hubungi-kami', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/profil/sejarah', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/profil/visi-misi', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/profil/struktur-organisasi', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/profil/program-sekolah', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/profil/staf-guru-karyawan', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/profil/prestasi', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/profil/alumni', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/uks', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/ppdb', 'total_visited' => 0, 'total_visitors' => 0],
            ['url' => 'http://127.0.0.1:8000/dashboard', 'total_visited' => 0, 'total_visitors' => 0],
        ];

        foreach ($sites as $site) {
            Site::create($site);
        }
    }
}
