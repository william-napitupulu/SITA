<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Kesehatan Sekolah - SMAN 1 Balige</title>
    <!-- Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        /* Custom Animation */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }

        /* Scale on hover */
        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        /* Style for the button */
        .back-button {
            padding: 0.5rem 1.5rem;
            font-size: 0.875rem; /* Smaller font */
            border-width: 2px;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 font-sans text-gray-800">

    <br><br><br>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto fade-in">
            <h2 class="text-2xl font-bold text-blue-800 mb-4 text-center fade-in">Selamat Datang di Unit Kesehatan Sekolah</h2>
            <p class="text-lg text-gray-700 mb-6 fade-in" style="animation-delay: 0.2s;">
                Unit Kesehatan Sekolah (UKS) di SMAN 1 Balige hadir untuk menjadi mitra dalam menjaga kesehatan dan kesejahteraan
                siswa. Kami berkomitmen untuk menyediakan layanan kesehatan yang menyeluruh, cepat, dan nyaman sehingga setiap siswa
                dapat belajar dan beraktivitas dengan optimal. Selain pemeriksaan kesehatan rutin, UKS juga memberikan edukasi 
                tentang gaya hidup sehat dan berbagai layanan kesehatan lain yang penting bagi perkembangan fisik dan mental siswa.
            </p>

            <div class="mt-8 fade-in" style="animation-delay: 0.4s;">
                <h3 class="text-xl font-semibold text-blue-800">Layanan yang Tersedia</h3>
                <p class="text-gray-700 mt-2">Kami memiliki berbagai layanan yang didesain khusus untuk mendukung kesehatan siswa:</p>
                <ul class="list-disc pl-5 mt-4 space-y-3 text-gray-700">
                    <li><strong>Pemeriksaan Kesehatan Rutin:</strong> Pemeriksaan berkala untuk mendeteksi dini masalah kesehatan dan memastikan bahwa siswa dalam kondisi terbaik untuk belajar.</li>
                    <li><strong>Penanganan Pertolongan Pertama (First Aid):</strong> Siap membantu siswa yang membutuhkan perawatan medis cepat, terutama saat terjadi cedera atau sakit mendadak di sekolah.</li>
                    <li><strong>Edutainment tentang Gaya Hidup Sehat:</strong> Program-program menarik yang mengajarkan siswa tentang pentingnya pola makan sehat, olahraga teratur, dan menjaga kesehatan mental melalui kegiatan yang interaktif.</li>
                    <li><strong>Vaksinasi dan Imunisasi untuk Siswa:</strong> Menyediakan vaksinasi rutin untuk mencegah penyakit menular, sehingga siswa tetap sehat dan dapat belajar dengan tenang.</li>
                </ul>
            </div>

            <div class="mt-8 fade-in" style="animation-delay: 0.6s;">
                <h3 class="text-xl font-semibold text-blue-800">Kegiatan Edukasi dan Promosi Kesehatan</h3>
                <p class="text-gray-700 mt-2">
                    UKS SMAN 1 Balige aktif mengadakan kegiatan edukatif yang bertujuan meningkatkan kesadaran siswa tentang pentingnya menjaga kesehatan. 
                    Kegiatan ini meliputi seminar tentang pola hidup sehat, kampanye anti rokok, serta pelatihan tentang cara menghadapi stres dan menjaga keseimbangan mental. 
                    Melalui kegiatan-kegiatan ini, kami berupaya membangun generasi muda yang sehat, aktif, dan memiliki pemahaman kuat mengenai pentingnya kesehatan.
                </p>
            </div>

            <div class="mt-8 fade-in" style="animation-delay: 0.8s;">
                <h3 class="text-xl font-semibold text-blue-800">Kontak Kami</h3>
                <p class="mt-2 text-gray-700">Apabila Anda memiliki pertanyaan, memerlukan informasi lebih lanjut, atau ingin berdiskusi mengenai program kesehatan, silakan hubungi kami:</p>
                <ul class="list-none mt-4">
                    <li class="text-gray-700"><strong>Telepon:</strong> (0632)-21082</li>
                    <li class="text-gray-700"><strong>Email:</strong> smansa_balige@yahoo.com</li>
                    <li class="text-gray-700"><strong>Lokasi:</strong> SMAN 1 Balige, Jl. Kartini Soposurung, Hinalang Bagasan, Kec. Balige, Kab. Toba, Prov. Sumatera Utara 22312</li>
                </ul>
            </div>

            <div class="mt-10 text-center fade-in" style="animation-delay: 1s;">
                
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

</html>
<?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/sarana/uks.blade.php ENDPATH**/ ?>