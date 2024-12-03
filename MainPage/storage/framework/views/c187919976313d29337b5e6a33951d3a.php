<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita dan Artikel - SMAN 1 Balige</title>
    <!-- Compiled Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
    <script>
        function showArticleDetail(articleId) {
            // Sembunyikan daftar artikel
            document.getElementById('articleList').style.display = 'none';
            // Tampilkan detail artikel yang dipilih
            document.getElementById(articleId).style.display = 'block';
        }

        function showArticleList() {
            // Tampilkan daftar artikel
            document.getElementById('articleList').style.display = 'block';
            // Sembunyikan semua detail artikel
            document.querySelectorAll('.article-detail').forEach(detail => {
                detail.style.display = 'none';
            });
        }
    </script>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800 font-sans">
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-5 shadow-md">
        <h1 class="text-3xl font-semibold">Berita & Artikel</h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-10">
        <!-- Section untuk Daftar Artikel -->
        <section id="articleList" class="bg-white rounded-lg shadow-md p-8 max-w-6xl mx-auto">
        <h1 class="text-3xl font-semibold text-blue-800 mb-6 text-center">Berita & Artikel</h1>
            <p class="text-lg mb-6 text-center">Berita terbaru dan artikel tentang kegiatan sekolah di SMAN 1 Balige.
                Temukan informasi terkini tentang kegiatan, prestasi, dan program sekolah.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Artikel 1 -->
                <div onclick="showArticleDetail('article1')"
                    class="cursor-pointer bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <img src="image1.jpg" alt="Thumbnail" class="rounded-md mb-4 h-40 w-full object-cover">
                    <div class="text-sm text-gray-500 mb-2"><i class="fas fa-user"></i> User Admin | <i
                            class="fas fa-calendar-alt"></i> 08 November 2024</div>
                    <h2 class="text-lg font-semibold text-blue-800 mb-2">TEST</h2>
                    <p class="text-gray-700">Informasi singkat tentang artikel atau berita...</p>
                </div>
                <!-- Artikel 2 -->
                <div onclick="showArticleDetail('article2')"
                    class="cursor-pointer bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <img src="image2.jpg" alt="Thumbnail" class="rounded-md mb-4 h-40 w-full object-cover">
                    <div class="text-sm text-gray-500 mb-2"><i class="fas fa-user"></i> User Admin | <i
                            class="fas fa-calendar-alt"></i> 05 November 2024</div>
                    <h2 class="text-lg font-semibold text-blue-800 mb-2">Kata-kata hari ini</h2>
                    <p class="text-gray-700">Informasi singkat tentang artikel atau berita...</p>
                </div>
                <!-- Artikel 3 -->
                <div onclick="showArticleDetail('article3')"
                    class="cursor-pointer bg-gray-50 border border-gray-200 p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <img src="image3.jpg" alt="Thumbnail" class="rounded-md mb-4 h-40 w-full object-cover">
                    <div class="text-sm text-gray-500 mb-2"><i class="fas fa-user"></i> User Admin | <i
                            class="fas fa-calendar-alt"></i> 05 November 2024</div>
                    <h2 class="text-lg font-semibold text-blue-800 mb-2">Kata-kata hari ini</h2>
                    <p class="text-gray-700">Informasi singkat tentang artikel atau berita...</p>
                </div>
            </div>

            <!-- Button Kembali ke Halaman Utama -->
            <div class="flex justify-center mt-10">
                
            </div>
        </section>

        <!-- Detail Artikel 1 -->
        <section id="article1" class="article-detail hidden bg-white rounded-lg shadow-md p-8 max-w-3xl mx-auto">
            <nav class="text-sm text-blue-800 mb-6">
                <a href="javascript:void(0);" onclick="showArticleList()" class="hover:underline">&larr; Berita &
                    Artikel</a>
            </nav>
            <h2 class="text-2xl font-bold text-blue-800 mb-4">TEST</h2>
            <div class="text-gray-500 text-sm mb-4"><i class="fas fa-user"></i> User Admin | <i
                    class="fas fa-calendar-alt ml-2"></i> 08 November 2024</div>
            <img src="image1.jpg" alt="Thumbnail" class="rounded-md mb-4">
            <p class="text-gray-700 mb-6">Isi lengkap dari artikel ini. Di sini Anda dapat menambahkan konten artikel
                yang lebih mendetail mengenai topik "TEST". Konten ini dapat mencakup gambar, teks panjang, dan
                informasi lainnya sesuai kebutuhan.</p>
        </section>

        <!-- Detail Artikel 2 -->
        <section id="article2" class="article-detail hidden bg-white rounded-lg shadow-md p-8 max-w-3xl mx-auto">
            <nav class="text-sm text-blue-800 mb-6">
                <a href="javascript:void(0);" onclick="showArticleList()" class="hover:underline">&larr; Berita &
                    Artikel</a>
            </nav>
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Kata-kata hari ini</h2>
            <div class="text-gray-500 text-sm mb-4"><i class="fas fa-user"></i> User Admin | <i
                    class="fas fa-calendar-alt ml-2"></i> 05 November 2024</div>
            <img src="image2.jpg" alt="Thumbnail" class="rounded-md mb-4">
            <p class="text-gray-700 mb-6">Isi lengkap dari artikel ini tentang "Kata-kata hari ini". Anda bisa
                memasukkan detail lebih lanjut tentang topik ini.</p>
        </section>

        <!-- Detail Artikel 3 -->
        <section id="article3" class="article-detail hidden bg-white rounded-lg shadow-md p-8 max-w-3xl mx-auto">
            <nav class="text-sm text-blue-800 mb-6">
                <a href="javascript:void(0);" onclick="showArticleList()" class="hover:underline">&larr; Berita &
                    Artikel</a>
            </nav>
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Kata-kata hari ini</h2>
            <div class="text-gray-500 text-sm mb-4"><i class="fas fa-user"></i> User Admin | <i
                    class="fas fa-calendar-alt ml-2"></i> 05 November 2024</div>
            <img src="image3.jpg" alt="Thumbnail" class="rounded-md mb-4">
            <p class="text-gray-700 mb-6">Detail lengkap dari artikel ini yang juga berjudul "Kata-kata hari ini".
                Tambahkan informasi lebih lengkap di sini sesuai kebutuhan.</p>
        </section>
    </main>

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->startSection('content'); ?>
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html><?php /**PATH D:\Proyek SMA 1\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/info/berita.blade.php ENDPATH**/ ?>