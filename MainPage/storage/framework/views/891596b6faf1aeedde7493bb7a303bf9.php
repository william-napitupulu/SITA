<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi - SMAN 1 Balige</title>
    <!-- Compiled Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-semibold">Visi dan Misi SMA 1 Balige</h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <!-- Section untuk Menampilkan Visi dan Misi -->
        <section class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">Visi</h2>
            <p class="text-lg text-gray-700 leading-relaxed text-center mb-8">
                <?php echo e($basicInfo->visi ?? 'Visi belum tersedia.'); ?>

            </p>

            <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">Misi</h2>
            <ul class="list-disc list-inside text-lg text-gray-700 leading-relaxed space-y-4">
                <?php $__currentLoopData = explode("\n", $basicInfo->misi ?? ''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $misiItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty(trim($misiItem))): ?>
                        <li><?php echo e($misiItem); ?></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <!-- Button Kembali ke Halaman Utama -->
            <div class="flex justify-center mt-10">
            
            </div>
        </section>
    </main>

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->startSection('content'); ?>
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

<<<<<<< HEAD

</html>
=======
</html>
>>>>>>> 588e1503e9264d12af02a059a0207576071f6545
<?php /**PATH D:\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/visi_misi.blade.php ENDPATH**/ ?>