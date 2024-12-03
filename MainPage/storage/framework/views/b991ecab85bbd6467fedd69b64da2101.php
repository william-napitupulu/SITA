<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Sekolah - SMAN 1 Balige</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-white text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md mt-24">
        <h1 class="text-3xl font-bold">Sejarah SMAN 1 Balige</h1>
        <p class="mt-2">Mengungkap Perjalanan dan Perkembangan Sekolah</p>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white min-h-full">
            <!-- Sejarah Sekolah Section -->
            
            <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-lg">
                <p class="text-gray-700 leading-relaxed mb-4">
                    SMAN 1 Balige didirikan pada tahun 1965 sebagai salah satu sekolah menengah atas pertama di Kabupaten Toba. Awalnya, sekolah ini beroperasi dengan fasilitas yang sederhana dan jumlah siswa yang terbatas. Namun, berkat dukungan dari masyarakat, guru, dan pemerintah setempat, SMAN 1 Balige terus berkembang pesat.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Pada tahun 1980-an, sekolah ini mulai memperluas fasilitas pendidikannya dengan membangun gedung-gedung baru, termasuk laboratorium sains, perpustakaan, dan ruang komputer. SMAN 1 Balige juga mulai dikenal dengan prestasi akademik yang gemilang di tingkat provinsi dan nasional.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Memasuki era 2000-an, SMAN 1 Balige semakin fokus pada inovasi pendidikan dengan menerapkan kurikulum berbasis teknologi dan program pengembangan karakter siswa. Saat ini, sekolah ini telah meluluskan ribuan alumni yang sukses di berbagai bidang, baik di tingkat lokal maupun internasional.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Visi SMAN 1 Balige adalah menjadi lembaga pendidikan unggulan yang mampu mencetak generasi penerus bangsa yang berkarakter, berprestasi, dan berwawasan global.
                </p>
            </div>
        </div>
    </main>

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('content'); ?>
    <?php $__env->stopSection(); ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\Kuliah\Del\Semester 5\Pabwe\Praktikum\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/sejarah.blade.php ENDPATH**/ ?>