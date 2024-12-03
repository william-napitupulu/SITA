<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - SMAN 1 Balige</title>
    <!-- Compiled Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-semibold">Hubungi Kami</h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white rounded-lg shadow-md p-8 max-w-md mx-auto text-center">
            <p class="text-lg mb-6">Informasi kontak SMAN 1 Balige:</p>
            <address class="not-italic">
                <p class="mb-2">Email: <a href="mailto:info@sman1balige.sch.id"
                        class="text-blue-800 hover:underline">infoadminSMA1@gmail.com</a></p>
                <p>Telepon: <a href="tel:+626221234567" class="text-blue-800 hover:underline">+62 821 0983 3312</a></p>
            </address>
            
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

</body>

</html><?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/info/hubungi.blade.php ENDPATH**/ ?>