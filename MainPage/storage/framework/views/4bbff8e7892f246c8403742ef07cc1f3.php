<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - OSIS SMAN 1 Balige</title>
    <!-- Compiled Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-green-600 to-teal-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-semibold">Struktur Organisasi OSIS SMAN 1 Balige</h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <!-- Section untuk Menampilkan Struktur Organisasi -->
        <section class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">Struktur Organisasi OSIS SMAN 1 Balige</h2>

            <!-- Struktur Organisasi Content -->
            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                <?php echo e($basicInfo->struktur_organisasi ?? 'Struktur Organisasi belum tersedia.'); ?>

            </p>

            <!-- Button Kembali ke Halaman Utama -->
            <div class="flex justify-center mt-8">
                
            </div>
        </section>
    </main>

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->startSection('content'); ?>
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/struktur_organisasi.blade.php ENDPATH**/ ?>