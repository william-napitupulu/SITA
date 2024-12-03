<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni - SMAN 1 Balige</title>
    <!-- Tambahkan Tailwind CSS dari file lokal -->
    <link href="../css/app.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-bold">Alumni SMAN 1 Balige</h1>
        <p class="mt-2">Menghargai kontribusi dan prestasi para alumni yang menginspirasi</p>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="p-8 space-y-6 bg-gray-50 max-w-4xl mx-auto text-center">
            <p class="text-lg mb-6">Para alumni SMAN 1 Balige telah menorehkan berbagai prestasi di berbagai bidang, mulai dari pendidikan, sains, hingga olahraga. Berikut adalah beberapa di antaranya yang telah membawa nama baik sekolah di kancah nasional dan internasional.</p>
            
            <!-- Alumni Section -->
            <div class="space-y-6">
                <!-- Alumni 1 -->
                <div class="bg-white border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h2 class="text-xl font-semibold text-blue-800">Natanael Jansudin Siregar</h2>
                    <p class="text-sm text-gray-500">Juara 1 Kompetisi Statistical Programming, 2020</p>
                    <p class="text-gray-700 mt-2">
                        Natanael, salah satu alumni berprestasi dari SMAN 1 Balige, memenangkan juara pertama dalam kompetisi pemrograman statistik tingkat nasional pada tahun 2020. Keahliannya dalam bahasa pemrograman Python telah membawa namanya ke panggung nasional.
                    </p>
                </div>

                <!-- Alumni 2 -->
                <div class="bg-white border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h2 class="text-xl font-semibold text-blue-800">Sarah Pangaribuan</h2>
                    <p class="text-sm text-gray-500">Doktor dalam Ilmu Kedokteran di Universitas Indonesia, 2018</p>
                    <p class="text-gray-700 mt-2">
                        Sarah adalah alumnus yang telah meraih gelar doktor dalam ilmu kedokteran dan dikenal atas kontribusinya dalam riset kesehatan. Ia telah menerbitkan sejumlah penelitian penting yang membantu meningkatkan kualitas kesehatan masyarakat di Indonesia.
                    </p>
                </div>

                <!-- Alumni 3 -->
                <div class="bg-white border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <h2 class="text-xl font-semibold text-blue-800">Andreas Simanjuntak</h2>
                    <p class="text-sm text-gray-500">Pengusaha Muda di Bidang Teknologi</p>
                    <p class="text-gray-700 mt-2">
                        Andreas mendirikan startup teknologi yang berfokus pada pengembangan aplikasi edukasi bagi anak-anak di Indonesia. Semangatnya dalam berinovasi telah menginspirasi banyak anak muda untuk menekuni bidang teknologi dan entrepreneurship.
                    </p>
                </div>
            </div>

            <a href="/" class="inline-block mt-8 text-lg text-blue-800 border border-blue-800 px-6 py-2 rounded hover:bg-blue-800 hover:text-white transition-colors">Kembali ke Halaman Utama</a>
        </div>
    </main>

    
    
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/alumni.blade.php ENDPATH**/ ?>