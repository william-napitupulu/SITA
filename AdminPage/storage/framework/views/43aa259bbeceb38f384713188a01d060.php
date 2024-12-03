

<?php $__env->startSection('title', 'Beranda: Informasi Dasar'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Beranda: Informasi Dasar</h3>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold mb-0">Informasi Dasar</h3>
                <!-- Tombol Tambah Data Dihapus -->
            </div>
        </div>

        <div class="card-body">
            <form action="<?php echo e(route('beranda.information.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <!-- Kontak Section -->
                        <h4>Kontak</h4>
                        <hr>
                        <div class="form-group">
                            <label>Kontak Phone</label>
                            <input type="text" name="kontak_phone" class="form-control" value="<?php echo e($informasiDasar->kontak_phone ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Kontak Email</label>
                            <input type="email" name="kontak_email" class="form-control" value="<?php echo e($informasiDasar->kontak_email ?? ''); ?>">
                        </div>

                        <!-- Lokasi Section -->
                        <h4>Lokasi</h4>
                        <hr>
                        <div class="form-group">
                            <label>Nama Lokasi</label>
                            <input type="text" name="nama_lokasi" class="form-control" value="<?php echo e($informasiDasar->nama_lokasi ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat Lokasi</label>
                            <input type="text" name="alamat_lokasi" class="form-control" value="<?php echo e($informasiDasar->alamat_lokasi ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Peta Lokasi</label>
                            <input type="url" name="peta_lokasi" class="form-control" value="<?php echo e($informasiDasar->peta_lokasi ?? ''); ?>">
                        </div>

                        <!-- Sosial Media Section -->
                        <h4>Sosial Media</h4>
                        <hr>
                        <?php $__currentLoopData = ['instagram', 'youtube', 'tiktok', 'facebook', 'twitter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $platform): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <label>Sosial Media <?php echo e(ucfirst($platform)); ?></label>
                                <input type="url" name="sosial_media_<?php echo e($platform); ?>" class="form-control" value="<?php echo e($informasiDasar->{'sosial_media_'.$platform} ?? ''); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- Informasi Section -->
                        <h4>Informasi</h4>
                        <hr>
                        <div class="form-group">
                            <label>Highlight</label>
                            <textarea name="highlight" class="form-control"><?php echo e($informasiDasar->highlight ?? ''); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Sub-Highlight</label>
                            <textarea name="sub_highlight" class="form-control"><?php echo e($informasiDasar->sub_highlight ?? ''); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Cover</label>
                            <input type="file" name="cover" class="form-control">
                            <?php if($informasiDasar->cover): ?>
                                <img src="<?php echo e(Storage::url($informasiDasar->cover)); ?>" alt="Cover" class="img-thumbnail mt-2" width="200">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Judul Video</label>
                            <input type="text" name="judul_video" class="form-control" value="<?php echo e($informasiDasar->judul_video ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Link Video</label>
                            <input type="url" name="link_video" class="form-control" value="<?php echo e($informasiDasar->link_video ?? ''); ?>">
                        </div>

                        <!-- Jumlah Data Section -->
                        <h4>Jumlah Data</h4>
                        <hr>
                        <?php $__currentLoopData = ['peserta_didik', 'guru', 'kelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <label>Jumlah <?php echo e(ucfirst(str_replace('_', ' ', $field))); ?></label>
                                <input type="number" name="jumlah_<?php echo e($field); ?>" class="form-control" value="<?php echo e($informasiDasar->{'jumlah_'.$field} ?? 1); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- Kepala Sekolah Section -->
                        <h4>Kepala Sekolah</h4>
                        <hr>
                        <div class="form-group">
                            <label>Photo Kepala Sekolah</label>
                            <input type="file" name="photo_kepala_sekolah" class="form-control">
                            <?php if($informasiDasar->photo_kepala_sekolah): ?>
                                <img src="<?php echo e(Storage::url($informasiDasar->photo_kepala_sekolah)); ?>" alt="Photo Kepala Sekolah" class="img-thumbnail mt-2" width="200">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Kepala Sekolah</label>
                            <input type="text" name="nama_kepala_sekolah" class="form-control" value="<?php echo e($informasiDasar->nama_kepala_sekolah ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Sambutan Kepala Sekolah</label>
                            <textarea name="sambutan_kepala_sekolah" class="form-control"><?php echo e($informasiDasar->sambutan_kepala_sekolah ?? ''); ?></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-end mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-group label {
        font-weight: bold;
    }
    img.img-thumbnail {
        max-height: 200px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/app/beranda_information.blade.php ENDPATH**/ ?>