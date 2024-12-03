<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip - SMAN 1 Balige</title>
    <!-- Compiled Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-semibold">Arsip Sekolah</h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto text-center">
        <h1 class="text-3xl font-semibold text-blue-800 mb-6 text-center">Arsip Sekolah</h1>
            <p class="text-lg mb-6">Dokumen dan arsip penting lainnya terkait SMAN 1 Balige. Akses berbagai dokumen dan
                informasi penting dari arsip sekolah.</p>

            <div class="space-y-6">
                <!-- Sample Archive Items -->
                <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h2 class="text-xl font-semibold text-blue-800">Laporan Tahunan 2023</h2>
                    <p class="text-sm text-gray-500">Dipublikasikan pada: 5 Januari 2024</p>
                    <p class="text-gray-700 mt-2">Laporan tahunan SMAN 1 Balige tahun 2023 yang mencakup berbagai
                        pencapaian dan kegiatan sepanjang tahun.</p>
                </div>

                <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h2 class="text-xl font-semibold text-blue-800">Pedoman Akademik 2024</h2>
                    <p class="text-sm text-gray-500">Dipublikasikan pada: 15 Desember 2023</p>
                    <p class="text-gray-700 mt-2">Pedoman akademik terbaru untuk tahun ajaran 2024 mencakup peraturan,
                        jadwal, dan kurikulum terbaru.</p>
                </div>

                <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h2 class="text-xl font-semibold text-blue-800">Rekapitulasi Hasil Ujian Nasional 2023</h2>
                    <p class="text-sm text-gray-500">Dipublikasikan pada: 20 November 2023</p>
                    <p class="text-gray-700 mt-2">Dokumen yang berisi hasil lengkap ujian nasional tahun 2023 dari semua
                        kelas di SMAN 1 Balige.</p>
                </div>
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

</html><?php /**PATH D:\Kuliah\Del\Semester 5\Pabwe\Praktikum\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/info/arsip.blade.php ENDPATH**/ ?>