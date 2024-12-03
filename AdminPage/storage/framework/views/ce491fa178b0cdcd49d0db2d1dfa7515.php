<?php $__env->startSection('title', 'Profil: Informasi Dasar'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Profil: Informasi Dasar</h2>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <form action="<?php echo e(route('profile.informasi-dasar.update')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <!-- Sejarah -->
        <div class="form-group">
            <label for="sejarah"><strong>Sejarah</strong></label>
            <textarea id="sejarah" name="sejarah" class="form-control" rows="5" style="resize: vertical;"
                      <?php echo e(Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor' ? '' : 'readonly'); ?>>
                <?php echo e(old('sejarah', $basicInfo->sejarah)); ?>

            </textarea>
        </div>

        <!-- Visi -->
        <div class="form-group">
            <label for="visi"><strong>Visi</strong></label>
            <textarea id="visi" name="visi" class="form-control" rows="5" style="resize: vertical;"
                      <?php echo e(Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor' ? '' : 'readonly'); ?>>
                <?php echo e(old('visi', $basicInfo->visi)); ?>

            </textarea>
        </div>

        <!-- Misi -->
        <div class="form-group">
            <label for="misi"><strong>Misi</strong></label>
            <textarea id="misi" name="misi" class="form-control" rows="5" style="resize: vertical;"
                      <?php echo e(Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor' ? '' : 'readonly'); ?>>
                <?php echo e(old('misi', $basicInfo->misi)); ?>

            </textarea>
        </div>

        <!-- Struktur Organisasi -->
        <div class="form-group">
            <label for="struktur_organisasi"><strong>Struktur Organisasi</strong></label>
            <textarea id="struktur_organisasi" name="struktur_organisasi" class="form-control" rows="5" style="resize: vertical;"
                      <?php echo e(Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor' ? '' : 'readonly'); ?>>
                <?php echo e(old('struktur_organisasi', $basicInfo->struktur_organisasi)); ?>

            </textarea>
        </div>

        <!-- Program Sekolah -->
        <div class="form-group">
            <label for="program_sekolah"><strong>Program Sekolah</strong></label>
            <textarea id="program_sekolah" name="program_sekolah" class="form-control" rows="5" style="resize: vertical;"
                      <?php echo e(Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor' ? '' : 'readonly'); ?>>
                <?php echo e(old('program_sekolah', $basicInfo->program_sekolah)); ?>

            </textarea>
        </div>

        <!-- Save Button for Admin and Editor -->
        <?php if(Auth::user()->role === 'Admin' || Auth::user()->role === 'Editor'): ?>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        <?php endif; ?>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/app/informasi-dasar.blade.php ENDPATH**/ ?>