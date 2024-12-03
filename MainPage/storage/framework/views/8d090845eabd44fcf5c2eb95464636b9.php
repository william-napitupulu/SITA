<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staf Guru dan Karyawan - SMAN 1 Balige</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-white text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md mt-24">
        <h1 class="text-3xl font-bold">Staf Guru dan Karyawan SMAN 1 Balige</h1>
        <p class="mt-2">Informasi dan Profil Staf Pengajar serta Karyawan</p>
    </header>


    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white min-h-full">
            <!-- Staf Guru Section -->
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Staf Guru</h2>
            <div class="flex flex-wrap gap-4">
                <?php $__currentLoopData = $staffGuru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-lg w-48 text-center">
                        <img src="<?php echo e(asset($guru->photo ?? 'images/default-profile.jpg')); ?>" alt="<?php echo e($guru->name); ?>"
                            class="w-full h-32 object-cover rounded-lg mb-2">
                        <h3 class="text-blue-800 font-semibold"><?php echo e($guru->name); ?></h3>
                        <p class="text-gray-500"><?php echo e($guru->position); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Karyawan Section -->
            <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Karyawan</h2>
            <div class="flex flex-wrap gap-4">
                <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-lg w-48 text-center">
                        <img src="<?php echo e(asset($k->photo ?? 'images/default-profile.jpg')); ?>" alt="<?php echo e($k->name); ?>"
                            class="w-full h-32 object-cover rounded-lg mb-2">
                        <h3 class="text-blue-800 font-semibold"><?php echo e($k->name); ?></h3>
                        <p class="text-gray-500"><?php echo e($k->position); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </main>

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('content'); ?>
    <?php $__env->stopSection(); ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH D:\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/staf_guru_karyawan.blade.php ENDPATH**/ ?>