<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - SMAN 1 Balige</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-semibold">Sejarah SMA 1 Balige</h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <section class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">Sejarah Singkat SMAN 1 Balige</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                <?php echo e($basicInfo->sejarah ?? 'Sejarah belum tersedia.'); ?>

            </p>

            <div class="flex justify-center mt-8">
                
            </div>
        </section>
    </main>
<<<<<<< HEAD
       
    

        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

=======

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('content'); ?>
    <?php $__env->stopSection(); ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH D:\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/sejarah.blade.php ENDPATH**/ ?>