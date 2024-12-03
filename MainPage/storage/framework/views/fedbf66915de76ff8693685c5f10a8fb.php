<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi - SMAN 1 Balige</title>
    <!-- Tambahkan CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function showPrestasi(year) {
            // Sembunyikan semua bagian prestasi
            document.querySelectorAll('.prestasi-section').forEach(section => {
                section.style.display = 'none';
            });

            // Tampilkan bagian prestasi yang dipilih
            if (year) {
                document.getElementById(`prestasi-${year}`).style.display = 'block';
            }
        }
    </script>
</head>

<body class="flex flex-col min-h-screen bg-white text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-bold">Prestasi SMAN 1 Balige</h1>
        <p class="mt-2">Mengenal Lebih Jauh Pencapaian dan Prestasi Siswa</p>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-10">
        <div class="bg-white min-h-full">
            <!-- Bagian Prestasi -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Prestasi</h2>
                <select id="year-select" class="border border-gray-300 rounded-lg p-2 text-gray-600" onchange="showPrestasi(this.value)">
                    <option value="">Pilih Tahun</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>
            </div>
            
            <!-- Penjelasan singkat -->
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-5xl mx-auto">
                <p class="text-lg mb-6 text-gray-700">SMAN 1 Balige telah meraih berbagai prestasi membanggakan, baik di tingkat lokal, nasional, maupun internasional. Silakan pilih tahun untuk melihat detail prestasi.</p>
            </div>


            <!-- Bagian Prestasi Tahun 2017 -->
            <div id="prestasi-2017" class="prestasi-section bg-white rounded-lg shadow-lg p-8 max-w-5xl mx-auto" style="display: none;">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Prestasi Tahun 2017</h2>
                <div class="space-y-8">
                    <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-xl transition-shadow">
                        <h3 class="text-xl font-semibold text-blue-800">Juara 1 Lomba Cerdas Cermat</h3>
                        <p class="text-sm text-gray-500">Dipublikasikan pada: 15 April 2017</p>
                        <p class="text-gray-700 mt-2">Tim SMAN 1 Balige berhasil meraih Juara 1 dalam Lomba Cerdas Cermat tingkat provinsi.</p>
                    </div>
                    <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-xl transition-shadow">
                        <h3 class="text-xl font-semibold text-blue-800">Pemenang Olimpiade Sains Kabupaten</h3>
                        <p class="text-sm text-gray-500">Dipublikasikan pada: 20 Mei 2017</p>
                        <p class="text-gray-700 mt-2">Siswa SMAN 1 Balige memenangkan Olimpiade Sains tingkat kabupaten dengan prestasi di bidang Matematika dan Biologi.</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Prestasi Tahun 2018 -->
            <div id="prestasi-2018" class="prestasi-section bg-white rounded-lg shadow-lg p-8 max-w-5xl mx-auto" style="display: none;">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Prestasi Tahun 2018</h2>
                <div class="space-y-8">
                    <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-xl transition-shadow">
                        <h3 class="text-xl font-semibold text-blue-800">Juara 2 Lomba Seni Tari Tradisional</h3>
                        <p class="text-sm text-gray-500">Dipublikasikan pada: 10 Agustus 2018</p>
                        <p class="text-gray-700 mt-2">Kelompok tari SMAN 1 Balige meraih Juara 2 dalam Lomba Seni Tari Tradisional tingkat nasional.</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Prestasi Tahun 2019 -->
            <div id="prestasi-2019" class="prestasi-section bg-white rounded-lg shadow-lg p-8 max-w-5xl mx-auto" style="display: none;">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Prestasi Tahun 2019</h2>
                <div class="space-y-8">
                    <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-xl transition-shadow">
                        <h3 class="text-xl font-semibold text-blue-800">Juara 1 Olimpiade Sains Nasional</h3>
                        <p class="text-sm text-gray-500">Dipublikasikan pada: 5 Mei 2019</p>
                        <p class="text-gray-700 mt-2">Siswa SMAN 1 Balige memenangkan Olimpiade Sains Nasional dengan medali emas di bidang Fisika.</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Prestasi Tahun 2020 -->
            <div id="prestasi-2020" class="prestasi-section bg-white rounded-lg shadow-lg p-8 max-w-5xl mx-auto" style="display: none;">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Prestasi Tahun 2020</h2>
                <div class="space-y-8">
                    <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-xl transition-shadow">
                        <h3 class="text-xl font-semibold text-blue-800">Juara 1 Kompetisi Matematika</h3>
                        <p class="text-sm text-gray-500">Dipublikasikan pada: 18 September 2020</p>
                        <p class="text-gray-700 mt-2">Tim Matematika SMAN 1 Balige berhasil meraih Juara 1 dalam kompetisi Matematika tingkat nasional.</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Prestasi Tahun 2021 -->
            <div id="prestasi-2021" class="prestasi-section bg-white rounded-lg shadow-lg p-8 max-w-5xl mx-auto" style="display: none;">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Prestasi Tahun 2021</h2>
                <div class="space-y-8">
                    <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-xl transition-shadow">
                        <h3 class="text-xl font-semibold text-blue-800">Juara 3 Lomba Debat Bahasa Inggris</h3>
                        <p class="text-sm text-gray-500">Dipublikasikan pada: 7 Oktober 2021</p>
                        <p class="text-gray-700 mt-2">Tim debat bahasa Inggris SMAN 1 Balige berhasil meraih Juara 3 dalam lomba debat tingkat internasional.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
            <hr>
            <!-- Centered Button at the Bottom -->
            <div class="flex justify-center mt-10">
                <a href="/" class="text-lg text-blue-800 border border-blue-800 px-6 py-2 rounded hover:bg-blue-800 hover:text-white transition-colors">Kembali ke Halaman Utama</a>
            </div>
    </main>
    

   

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/prof/prestasi.blade.php ENDPATH**/ ?>