<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'SMAN 1 Balige'); ?></title>

    <!-- Tailwind CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- Font Awesome untuk ikon media sosial -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50">

    <!-- Sertakan Header -->
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Ini akan memuat file header.blade.php -->

    <!-- Konten Utama -->
    <div class="container mx-auto mt-8">
        <?php echo $__env->yieldContent('content'); ?> <!-- Konten halaman yang spesifik akan ditampilkan di sini -->
    </div>

    <!-- Sertakan Footer -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Ini akan memuat file footer.blade.php -->

</body>
</html>
<?php /**PATH D:\DEL\Semester V\Pengembangan Aplikasi Berbasis Web\pkm\pabwe-pkm-proyek-2024-k1\MainPage\resources\views/layouts/app.blade.php ENDPATH**/ ?>