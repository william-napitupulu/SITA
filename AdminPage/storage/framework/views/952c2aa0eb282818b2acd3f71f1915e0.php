<?php $__env->startSection('title', 'Arsip'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dasbor</a></li>
            <li class="breadcrumb-item active"><a>Informasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Arsip</li>
        </ol>
    </nav>

    <h2 class="mb-4">Informasi: Arsip</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informasi Arsip</h5>
            <p class="card-text">Diperbarui pada: <?php echo e($arsip->updated_at ? $arsip->updated_at->format('d F Y H:i') : 'Belum diperbarui'); ?></p>

            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <form action="<?php echo e(route('informasi.arsip.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <textarea name="arsip_info" class="form-control" rows="5" style="resize: vertical;"
                        <?php echo e(Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor' ? '' : 'readonly'); ?>>
                        <?php echo e(old('arsip_info', $arsip->arsip_info ?? '')); ?>

                    </textarea>
                </div>
                <?php if(Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor'): ?>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/informasi/arsip.blade.php ENDPATH**/ ?>