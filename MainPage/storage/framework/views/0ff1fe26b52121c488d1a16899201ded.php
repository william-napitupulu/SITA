<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SMAN 1 Balige</title>
    <!-- Compiled Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-semibold">Galeri SMAN 1 Balige</h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto text-center">
            <p class="text-lg mb-6">Koleksi foto dan dokumentasi kegiatan di SMAN 1 Balige. Lihat momen-momen berharga
                dari berbagai acara dan kegiatan sekolah.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-6">
                <!-- Sample images, replace src values with actual image URLs -->
                <img src="image1.jpg" alt="Kegiatan 1"
                    class="w-full h-auto rounded-lg shadow-md hover:scale-105 transition-transform">
                <img src="image2.jpg" alt="Kegiatan 2"
                    class="w-full h-auto rounded-lg shadow-md hover:scale-105 transition-transform">
                <img src="image3.jpg" alt="Kegiatan 3"
                    class="w-full h-auto rounded-lg shadow-md hover:scale-105 transition-transform">
                <img src="image4.jpg" alt="Kegiatan 4"
                    class="w-full h-auto rounded-lg shadow-md hover:scale-105 transition-transform">
                <img src="image5.jpg" alt="Kegiatan 5"
                    class="w-full h-auto rounded-lg shadow-md hover:scale-105 transition-transform">
                <img src="image6.jpg" alt="Kegiatan 6"
                    class="w-full h-auto rounded-lg shadow-md hover:scale-105 transition-transform">
            </div>

          
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

</html><?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/info/galeri.blade.php ENDPATH**/ ?>