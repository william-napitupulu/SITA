<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Sekolah - SMAN 1 Balige</title>
    <!-- Tambahkan Tailwind CSS dari file lokal -->
    <link href="../css/app.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-bold">Program Sekolah SMAN 1 Balige</h1>
        <p class="mt-2">Meningkatkan prestasi melalui berbagai kegiatan unggulan</p>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="p-8 space-y-6 bg-gray-50">
            <!-- Program Akademik -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold text-blue-800">Program Akademik</h3>
               
                <p class="text-gray-700 mt-2">
                    Program akademik di SMAN 1 Balige meliputi peningkatan kualitas pembelajaran dengan kurikulum terbaru, kelas tambahan untuk mata pelajaran penting, dan pelatihan khusus untuk persiapan ujian nasional.
                </p>
            </div>

            <!-- Program Ekstrakurikuler -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold text-blue-800">Program Ekstrakurikuler</h3>
                
                <p class="text-gray-700 mt-2">
                    SMAN 1 Balige menawarkan berbagai program ekstrakurikuler, termasuk olahraga (basket, sepak bola, dan bulu tangkis), seni (paduan suara, tari, dan musik), dan klub ilmiah untuk mendorong bakat siswa di luar akademik.
                </p>
            </div>

            <!-- Program Pengembangan Fasilitas -->
            <div class="bg-white border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold text-blue-800">Program Pengembangan Fasilitas</h3>
                
                <p class="text-gray-700 mt-2">
                    SMAN 1 Balige terus meningkatkan fasilitas sekolah untuk mendukung kegiatan belajar. Program ini mencakup pengembangan laboratorium, perpustakaan, ruang kelas modern, dan area hijau untuk menciptakan lingkungan yang nyaman bagi siswa.
                </p>
            </div>
        </div>
        <a href="/" class="inline-block mt-8 text-lg text-blue-800 border border-blue-800 px-6 py-2 rounded hover:bg-blue-800 hover:text-white transition-colors">Kembali ke Halaman Utama</a>
    </main>
    
    

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/program_sekolah.blade.php ENDPATH**/ ?>