<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAN 1 Balige</title>

    <!-- Compiled Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <!-- Font Awesome for social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                    class="px-6 py-2 border border-blue-500 text-blue-500 rounded-full hover:bg-blue-500 hover:text-white transition duration-300">PPDB</a>
            </div>
        </div>
        </div>
    </nav>

    <!-- Container 1: Selamat Datang Section -->
    <div class="relative z-0 bg-gradient-to-r from-blue-500 to-teal-400 min-h-screen flex items-center justify-center mt-8"
        style="background-image: url('background.jpg'); background-size: cover; background-position: center;">
        <div
            class="bg-white rounded-lg shadow-2xl w-11/12 md:w-3/4 lg:w-2/3 xl:w-1/2 overflow-hidden transform transition-all duration-300 hover:shadow-3xl hover:scale-105">
            <div
                class="flex flex-col items-center p-8 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-t-lg">
                <div
                    class="mb-4 w-32 h-32 rounded-full bg-white overflow-hidden border-4 border-blue-600 shadow-lg transform transition hover:scale-110">
                    <img src="logo.png" alt="Teacher" class="w-full h-full object-cover">
                </div>
                <h1 class="text-4xl font-extrabold mb-2 tracking-wide">Selamat Datang di SMAN 1 Balige</h1>
                <p class="text-center text-lg font-medium">Platform Informasi Sekolah untuk Peserta Didik, Guru, dan
                    Staf</p>
            </div>
            <div class="p-6 text-center">
                <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                    Dapatkan informasi terbaru mengenai kegiatan sekolah, pengumuman, jadwal, dan berbagai layanan yang
                    disediakan untuk mendukung kebutuhan siswa, guru, dan staf.
                </p>
            </div>
        </div>
    </div>


    <!-- Container 2: Fasilitas Sekolah Section -->
    <div
        class="relative z-0 bg-gradient-to-r from-blue-500 to-teal-400 min-h-screen flex items-center justify-center mt-8">
        <div
            class="bg-white rounded-lg shadow-2xl w-11/12 md:w-3/4 lg:w-2/3 xl:w-1/2 overflow-hidden transform transition-all duration-300 hover:shadow-3xl hover:scale-105">
            <div class="p-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Fasilitas Sekolah</h2>
                <p class="text-gray-600 text-lg leading-relaxed">Kami menyediakan berbagai fasilitas untuk mendukung
                    proses belajar mengajar, seperti ruang kelas modern, laboratorium, perpustakaan, dan lain-lain.</p>
            </div>
            <div class="p-6 flex justify-center space-x-4">
                <div class="flex flex-col items-center">
                    <div
                        class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-md">
                        📚
                    </div>
                    <p class="text-gray-700 mt-2 text-sm">Perpustakaan</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-md">
                        🧪
                    </div>
                    <p class="text-gray-700 mt-2 text-sm">Laboratorium</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-md">
                        🖥️
                    </div>
                    <p class="text-gray-700 mt-2 text-sm">Komputer</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Container 3: Visi dan Misi Kami Section -->
    <div
        class="relative z-0 bg-gradient-to-r from-blue-500 to-teal-400 min-h-screen flex items-center justify-center mt-8">
        <div
            class="bg-white rounded-lg shadow-2xl w-11/12 md:w-3/4 lg:w-2/3 xl:w-1/2 overflow-hidden transform transition-all duration-300 hover:shadow-3xl hover:scale-105">
            <div class="p-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Visi dan Misi Kami</h2>
                <p class="text-gray-600 text-lg leading-relaxed">Misi kami adalah mencetak generasi muda yang cerdas,
                    berakhlak mulia, dan siap menghadapi tantangan masa depan.</p>
            </div>
            <div class="p-6 text-center">
                <ul class="text-gray-700 text-sm space-y-2">
                    <li>✅ Meningkatkan kualitas pendidikan melalui kurikulum inovatif.</li>
                    <li>✅ Mengembangkan karakter siswa yang berbudi pekerti luhur.</li>
                    <li>✅ Membekali siswa dengan keterampilan hidup yang relevan.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Container 4: Kontak Kami Section -->
    <div
        class="relative z-0 bg-gradient-to-r from-blue-500 to-teal-400 min-h-screen flex items-center justify-center mt-8">
        <div
            class="bg-white rounded-lg shadow-2xl w-11/12 md:w-3/4 lg:w-2/3 xl:w-1/2 overflow-hidden transform transition-all duration-300 hover:shadow-3xl hover:scale-105">
            <div class="p-8 md:p-10 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Kontak Kami</h2>
                <p class="text-gray-600 mb-8 text-lg">Jika Anda membutuhkan informasi lebih lanjut, hubungi kami melalui
                    email atau telepon di bawah ini.</p>

                <div class="flex flex-col space-y-6">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12h.01M8 12h.01m4 0h.01M9 16h6M9 8h6m-6-4h6a2 2 0 012 2v12a2 2 0 01-2 2H9a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg>
                        </div>
                        <span class="text-gray-700 text-lg">adminSMA1@gmail.com</span>
                    </div>
                    <div class="flex items-center justify-center space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h1m16 0h1M4 6h16M4 14h16M4 18h16m-7-4h.01" />
                            </svg>
                        </div>
                        <span class="text-gray-700 text-lg">+62 821 0983 3312</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->startSection('content'); ?>
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH D:\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/welcome.blade.php ENDPATH**/ ?>