<?php $__env->startSection('title', 'Informasi: Berita & Artikel'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- Page Title and Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Informasi: Berita & Artikel</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dasbor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Berita & Artikel</li>
            </ol>
        </nav>
    </div>
    
    <!-- Card Container -->
    <div class="card">
        <div class="card-header">
            <!-- Title, "Tambah Data" Button, and Search Bar -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="font-weight-bold mb-0">Berita & Artikel</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addBeritaModal" onclick="clearForm()">Tambah Data</button>
            </div>
            
            <!-- Search Bar aligned to the right -->
            <div class="d-flex justify-content-end">
                <input type="text" class="form-control w-25" id="search" placeholder="Search..." onkeyup="liveSearch()">
            </div>
        </div>
        
        <!-- Table Content -->
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $beritaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="berita-row-<?php echo e($beritaItem->id); ?>">
                            <td><?php echo e($index + 1); ?></td>
                            <td>
                                <img src="<?php echo e($beritaItem->cover ? asset('storage/' . $beritaItem->cover) : asset('path/to/default/image.png')); ?>" width="50" height="50" class="rounded">
                            </td>
                            <td><?php echo e($beritaItem->title); ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editBerita('<?php echo e($beritaItem->id); ?>')">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo e($beritaItem->id); ?>', '<?php echo e($beritaItem->title); ?>')">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($berita->links()); ?>

        </div>
    </div>
</div>

<!-- Modal for Adding/Editing Berita -->
<!-- Modal for Adding/Editing Berita -->
<div class="modal fade" id="addBeritaModal" tabindex="-1" aria-labelledby="addBeritaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="beritaForm" action="<?php echo e(route('berita.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="berita_id" name="berita_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBeritaModalLabel">Tambah Data Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Cover Input -->
                    <div class="form-group">
                        <label for="cover">Cover</label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <!-- Content/Description Input -->
                    <div class="form-group">
                        <label for="content">Deskripsi</label>
                        <textarea name="content" id="content" class="form-control" rows="5" style="resize: vertical;" required></textarea>
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


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="deleteConfirmText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function confirmDelete(id, title) {
        const form = document.getElementById('deleteForm');
        form.action = `/informasi/berita-artikel/${id}`;
        document.getElementById('deleteConfirmText').innerHTML = `Apakah kamu yakin ingin menghapus berita <strong>"${title}"</strong>?`;
        $('#deleteConfirmModal').modal('show');
    }

    function editBerita(id) {
        fetch(`/informasi/berita-artikel/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('berita_id').value = data.id;
                document.getElementById('title').value = data.title;
                $('#addBeritaModal').modal('show');
            });
    }

    function clearForm() {
        document.getElementById('beritaForm').reset();
        document.getElementById('berita_id').value = '';
    }

    function liveSearch() {
        let searchTerm = document.getElementById("search").value.toLowerCase();
        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            const title = row.querySelector("td:nth-child(3)").innerText.toLowerCase();
            if (title.includes(searchTerm)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/informasi/berita-artikel.blade.php ENDPATH**/ ?>