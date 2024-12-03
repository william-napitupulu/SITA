<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi - SMAN 1 Balige</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-white text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md mt-24">
        <h1 class="text-3xl font-bold">Visi dan Misi SMAN 1 Balige</h1>
        <p class="mt-2">Menjadi Sekolah Unggulan Berkarakter dan Berprestasi</p>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white min-h-full">
            <!-- Visi Section -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Visi</h2>
            <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-lg mb-8">
                <p class="text-gray-700 leading-relaxed">
                    "Misi kami adalah mencetak generasi muda yang cerdas, berakhlak mulia, dan siap menghadapi tantangan masa depan."
                </p>
            </div>

            <!-- Misi Section -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Misi</h2>
            <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-lg">
                <ul class="list-disc list-inside text-gray-700 leading-relaxed space-y-2">
                    <li>Meningkatkan kualitas pendidikan melalui kurikulum inovatif.</li>
                    <li>Mengembangkan karakter siswa yang berbudi pekerti luhur.</li>
                    <li>Membekali siswa dengan keterampilan hidup yang relevan.</li>  
                </ul>
            </div>
        </div>
    </main>

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('content'); ?>
    <?php $__env->stopSection(); ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\Kuliah\Del\Semester 5\Pabwe\Praktikum\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/visi_misi.blade.php ENDPATH**/ ?>