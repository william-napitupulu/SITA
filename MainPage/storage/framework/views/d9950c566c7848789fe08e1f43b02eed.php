<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - SMAN 1 Balige</title>
    <!-- Compiled Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- Font Awesome for social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-semibold">Penerimaan Peserta Didik Baru (PPDB)</h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white rounded-lg shadow-md p-8 max-w-2xl mx-auto text-center">
            <p class="text-lg mb-6">
                Informasi terkait pendaftaran peserta didik baru di SMAN 1 Balige. Kami menyediakan informasi lengkap
                mengenai proses pendaftaran, syarat, dan jadwal seleksi untuk calon siswa baru.
            </p>
            <a href="/"
                class="inline-block mt-8 text-lg text-blue-800 border border-blue-800 px-6 py-2 rounded hover:bg-blue-800 hover:text-white transition-colors">Kembali
                ke Halaman Utama</a>
        </div>
    </main>

    <!-- Footer Section -->
    <div style="background-color: black; color: white; padding: 4rem 0;">
        <div
            style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; display: flex; flex-direction: row; gap: 1.5rem; align-items: start; justify-content: space-between;">


        </div>

        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php $__env->startSection('content'); ?>
        <?php $__env->stopSection(); ?>

        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    </div>



</html><?php /**PATH D:\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/info/ppdb.blade.php ENDPATH**/ ?>