<?php $__env->startSection('title', 'Informasi: Galeri'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Informasi: Galeri</h2>
    
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold mb-0">Galeri</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addGaleriModal">Tambah Data</button>
            </div>
            
            <div class="d-flex justify-content-end mt-3">
                <input type="text" class="form-control w-25" id="search" placeholder="Search..." onkeyup="liveSearch()">
            </div>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Keterangan</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td>
                                <img src="<?php echo e($galeri->photo ? asset('storage/' . $galeri->photo) : asset('path/to/default/image.png')); ?>" width="50" height="50" class="rounded">
                            </td>
                            <td><?php echo e($galeri->description); ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editGaleri('<?php echo e($galeri->id); ?>')">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo e($galeri->id); ?>', '<?php echo e($galeri->description); ?>')">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($galeris->links()); ?>

        </div>
    </div>
</div>

<!-- Modal for Adding/Editing Galeri -->
<div class="modal fade" id="addGaleriModal" tabindex="-1" aria-labelledby="addGaleriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="galeriForm" action="<?php echo e(route('galeri.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="galeri_id" name="galeri_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGaleriModalLabel">Tambah Data Galeri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Keterangan</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function confirmDelete(id, description) {
        const form = document.getElementById('deleteForm');
        form.action = `/informasi/galeri/${id}`;
        document.getElementById('deleteConfirmText').innerHTML = `Apakah kamu yakin ingin menghapus galeri <strong>"${description}"</strong>?`;
        $('#deleteConfirmModal').modal('show');
    }

    function editGaleri(id) {
        fetch(`/informasi/galeri/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('galeri_id').value = data.id;
                document.getElementById('description').value = data.description;
                $('#addGaleriModal').modal('show');
            });
    }

    function clearForm() {
        document.getElementById('galeriForm').reset();
        document.getElementById('galeri_id').value = '';
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/informasi/galeri.blade.php ENDPATH**/ ?>