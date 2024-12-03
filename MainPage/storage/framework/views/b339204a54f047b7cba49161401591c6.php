<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Sekolah - SMAN 1 Balige</title>
    <!-- Compiled Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-semibold">Program Sekolah SMAN 1 Balige</h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <!-- Section untuk Menampilkan Program Sekolah -->
        <section class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-indigo-800 mb-6 text-center">Program Unggulan SMAN 1 Balige</h2>

            <!-- Program Sekolah Content -->
            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                <?php echo e($basicInfo->program_sekolah ?? 'Program Sekolah belum tersedia.'); ?>

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
>>>>>>> 588e1503e9264d12af02a059a0207576071f6545
</body>

</html><?php /**PATH D:\Kuliah\Del\Semester 5\Pabwe\Praktikum\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/program_sekolah.blade.php ENDPATH**/ ?>