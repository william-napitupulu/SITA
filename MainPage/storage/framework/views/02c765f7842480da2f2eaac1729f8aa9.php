<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staf Guru dan Karyawan - SMAN 1 Balige</title>
    <!-- Tambahkan CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-white text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-bold">Staf Guru dan Karyawan SMAN 1 Balige</h1>
        <p class="mt-2">Informasi dan Profil Staf Pengajar serta Karyawan</p>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white min-h-full">
            <!-- Bagian Staf Guru -->
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Staf Guru</h2>
            <div class="flex flex-wrap gap-4">
                <!-- Profil Anton -->
                <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-lg w-48 text-center">
                    <img src="path/to/anton-image.jpg" alt="Anton" class="w-full h-32 object-cover rounded-lg mb-2">
                    <h3 class="text-blue-800 font-semibold">Anton</h3>
                    <p class="text-gray-500">Dosen</p>
                </div>
                
                <!-- Profil Lebron -->
                <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-lg w-48 text-center">
                    <img src="path/to/lebron-image.jpg" alt="Lebron" class="w-full h-32 object-cover rounded-lg mb-2">
                    <h3 class="text-blue-800 font-semibold">Lebron</h3>
                    <p class="text-gray-500">Fisika</p>
                </div>
            </div>

            <!-- Bagian Karyawan -->
            <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Karyawan</h2>
            <div class="flex flex-wrap gap-4">
                <!-- Profil Gyro -->
                <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-lg w-48 text-center">
                    <img src="path/to/gyro-image.jpg" alt="Gyro" class="w-full h-32 object-cover rounded-lg mb-2">
                    <h3 class="text-blue-800 font-semibold">Gyro</h3>
                    <p class="text-gray-500">CS</p>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="p-8 bg-white text-center mt-8">
            <a href="/" class="inline-block text-lg text-blue-800 border border-blue-800 px-6 py-2 rounded hover:bg-blue-800 hover:text-white transition-colors">Kembali ke Halaman Utama</a>
        </div>
    </main>

   
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/staf_guru_karyawan.blade.php ENDPATH**/ ?>