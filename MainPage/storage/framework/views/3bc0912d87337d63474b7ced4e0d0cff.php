<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAN 1 Balige</title>

    <!-- Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- Font Awesome for social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Browser Icon -->
    <link rel="icon" href="<?php echo e(asset('logo.png')); ?>" type="image/x-icon">
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg py-4 fixed top-0 left-0 w-full z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo Section -->
            <div class="flex items-center space-x-3">
                <img src="logo.png" alt="Logo SMAN 1 Balige" class="w-12 h-12 rounded-full">
                <span class="text-2xl font-bold text-gray-800">SMAN 1 Balige</span>
            </div>

            <!-- Navigation Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <!-- Beranda Link -->
                <a href="<?php echo e(route('welcome')); ?>"
                    class="<?php echo e(request()->routeIs('welcome') ? 'text-blue-600 font-semibold' : 'text-gray-800'); ?> hover:text-blue-700 transition duration-200 ease-in-out">Beranda</a>

                <!-- Informasi Dropdown Menu -->
                <div class="relative group">
                    <a href="#"
                        class="nav-button flex items-center <?php echo e(request()->routeIs('berita', 'galeri', 'arsip', 'hubungi') ? 'text-blue-600 font-semibold' : 'text-gray-800'); ?> hover:text-blue-600 transition duration-200 ease-in-out">
                        Informasi
                        <i
                            class="fas fa-chevron-down text-xs ml-1 transform rotate-0 transition-transform duration-200 group-hover:-rotate-180"></i>
                    </a>
                    <!-- Submenu -->
                    <div
                        class="dropdown-menu absolute opacity-0 invisible transform scale-95 transition-all duration-200 ease-in-out bg-blue-500 shadow-lg rounded-md w-56 top-full left-0 z-10 origin-top group-hover:opacity-100 group-hover:visible group-hover:scale-100">
                        <a href="<?php echo e(route('berita')); ?>"
                            class="<?php echo e(request()->routeIs('berita') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Berita
                            &amp; Artikel</a>
                        <a href="<?php echo e(route('galeri')); ?>"
                            class="<?php echo e(request()->routeIs('galeri') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Galeri</a>
                        <a href="<?php echo e(route('arsip')); ?>"
                            class="<?php echo e(request()->routeIs('arsip') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Arsip</a>
                        <a href="<?php echo e(route('hubungi')); ?>"
                            class="<?php echo e(request()->routeIs('hubungi') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Hubungi
                            Kami</a>
                    </div>
                </div>

                <!-- Profil Dropdown Menu -->
                <div class="relative group">
                    <a href="#"
                        class="nav-button flex items-center <?php echo e(request()->is('prof.*') ? 'text-blue-600 font-semibold' : 'text-gray-800'); ?> hover:text-blue-600 transition duration-200 ease-in-out">
                        Profil
                        <i
                            class="fas fa-chevron-down text-xs ml-1 transform rotate-0 transition-transform duration-200 group-hover:-rotate-180"></i>
                    </a>
                    <!-- Submenu -->
                    <div
                        class="dropdown-menu absolute opacity-0 invisible transform scale-95 transition-all duration-200 ease-in-out bg-blue-500 shadow-lg rounded-md w-56 top-full left-0 z-10 origin-top group-hover:opacity-100 group-hover:visible group-hover:scale-100">
                        <a href="<?php echo e(route('prof.sejarah')); ?>"
                            class="<?php echo e(request()->routeIs('prof.sejarah') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Sejarah</a>
                        <a href="<?php echo e(route('prof.visi_misi')); ?>"
                            class="<?php echo e(request()->routeIs('prof.visi_misi') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Visi
                            &amp; Misi</a>
                        <a href="<?php echo e(route('prof.struktur_organisasi')); ?>"
                            class="<?php echo e(request()->routeIs('prof.struktur_organisasi') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Struktur
                            Organisasi</a>
                        <a href="<?php echo e(route('prof.program_sekolah')); ?>"
                            class="<?php echo e(request()->routeIs('prof.program_sekolah') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Program
                            Sekolah</a>
                        <a href="<?php echo e(route('prof.staf_guru_karyawan')); ?>"
                            class="<?php echo e(request()->routeIs('prof.staf_guru_karyawan') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Staf
                            Guru &amp; Karyawan</a>
                        <a href="<?php echo e(route('prof.prestasi')); ?>"
                            class="<?php echo e(request()->routeIs('prof.prestasi') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Prestasi</a>
                        <a href="<?php echo e(route('prof.alumni')); ?>"
                            class="<?php echo e(request()->routeIs('prof.alumni') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Alumni</a>
                    </div>
                </div>

                <!-- Sarana & Prasarana Dropdown Menu -->
                <div class="relative group">
                    <a href="#"
                        class="nav-button flex items-center <?php echo e(request()->is('sarana.*') ? 'text-blue-600 font-semibold' : 'text-gray-800'); ?> hover:text-blue-600 transition duration-200 ease-in-out">
                        Sarana &amp; Prasarana
                        <i
                            class="fas fa-chevron-down text-xs ml-1 transform rotate-0 transition-transform duration-200 group-hover:-rotate-180"></i>
                    </a>
                    <!-- Submenu -->
                    <div
                        class="dropdown-menu absolute opacity-0 invisible transform scale-95 transition-all duration-200 ease-in-out bg-blue-500 shadow-lg rounded-md w-56 top-full left-0 z-10 origin-top group-hover:opacity-100 group-hover:visible group-hover:scale-100">
                        <a href="<?php echo e(route('sarana.uks')); ?>"
                            class="<?php echo e(request()->routeIs('sarana.uks') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">Unit
                            Kesehatan Sekolah</a>
                    </div>
                </div>

                <!-- Platform Kami Dropdown Menu -->
                <div class="relative group">
                    <a href="#"
                        class="nav-button flex items-center <?php echo e(request()->is('platform.*') ? 'text-blue-600 font-semibold' : 'text-gray-800'); ?> hover:text-blue-600 transition duration-200 ease-in-out">
                        Platform Kami
                        <i
                            class="fas fa-chevron-down text-xs ml-1 transform rotate-0 transition-transform duration-200 group-hover:-rotate-180"></i>
                    </a>
                    <!-- Submenu -->
                    <div
                        class="dropdown-menu absolute opacity-0 invisible transform scale-95 transition-all duration-200 ease-in-out bg-blue-500 shadow-lg rounded-md w-56 top-full left-0 z-10 origin-top group-hover:opacity-100 group-hover:visible group-hover:scale-100">
                        <a href="<?php echo e(route('platform.sis')); ?>"
                            class="<?php echo e(request()->routeIs('platform.sis') ? 'text-blue-600 font-semibold' : 'text-white'); ?> block px-4 py-2 hover:bg-blue-600 transition duration-150 ease-in-out">SIS</a>
                    </div>
                </div>

                <!-- Social Media Icons -->
                <div class="flex items-center space-x-4 ml-4">
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition duration-150 ease-in-out"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-600 hover:text-red-600 transition duration-150 ease-in-out"><i
                            class="fab fa-youtube"></i></a>
                    <a href="#" class="text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out"><i
                            class="fab fa-tiktok"></i></a>
                    <a href="#" class="text-gray-600 hover:text-blue-800 transition duration-150 ease-in-out"><i
                            class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-600 hover:text-blue-400 transition duration-150 ease-in-out"><i
                            class="fab fa-twitter"></i></a>
                </div>

                <!-- PPDB Button -->
                <div class="ml-4">
                    <a href="<?php echo e(route('ppdb')); ?>"
                        class="<?php echo e(request()->routeIs('ppdb') ? 'text-blue-600 font-semibold' : 'text-blue-500'); ?> px-6 py-2 border border-blue-500 rounded-full hover:bg-blue-500 hover:text-white transition duration-300">PPDB</a>
                </div>
            </div>
        </div>
    </nav>
</body>

</html><?php /**PATH D:\Kuliah\Del\Semester 5\Pabwe\Praktikum\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/layouts/header.blade.php ENDPATH**/ ?>