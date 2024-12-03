<?php $__env->startSection('title', 'Informasi: Berita & Artikel'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Informasi: Berita & Artikel</h2>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold mb-0">Berita & Artikel</h3>
                <button class="btn btn-primary" onclick="clearForm()" data-toggle="modal" data-target="#editBeritaModal">Tambah Data</button>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <input type="text" class="form-control w-25" id="search" placeholder="Search..." onkeyup="liveSearch()">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No <i class="fas fa-sort sort-icon" onclick="toggleSort('id')" id="sort-id"></i></th>
                        <th>Cover</th>
                        <th>Judul <i class="fas fa-sort sort-icon" onclick="toggleSort('title')" id="sort-title"></i></th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody id="berita-table-body">
                    <?php
                        $startNumber = ($berita->currentPage() - 1) * $berita->perPage();
                    ?>
                    <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="berita-row-<?php echo e($item->id); ?>">
                            <td><?php echo e($startNumber + $loop->iteration); ?></td>
                            <td>
                                <?php if($item->cover): ?>
                                    <img src="<?php echo e(asset('storage/' . $item->cover)); ?>" width="50" height="50" class="rounded">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('path/to/default/cover.png')); ?>" width="50" height="50" class="rounded">
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($item->title); ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="editBerita('<?php echo e($item->id); ?>')">Edit</button>
                                <button class="btn btn-danger" onclick="confirmDelete('<?php echo e($item->id); ?>', '<?php echo e($item->title); ?>')">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="pagination-container">
                <?php echo e($berita->appends(request()->except('page'))->links()); ?>

            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div class="modal fade" id="editBeritaModal" tabindex="-1" aria-labelledby="editBeritaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="beritaForm" action="<?php echo e(route('berita.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="berita_id" name="berita_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBeritaModalLabel">Tambah Data Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cover">Cover</label>
                        <input type="file" name="cover" id="cover" class="form-control">
                        <img id="cover-preview" src="#" alt="Cover Preview" style="display: none; max-width: 100px; margin-top: 10px;">
                    </div>
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Deskripsi</label>
                        <textarea name="content" id="content" class="form-control" required></textarea>
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
    let currentSortColumn = '<?php echo e($sortColumn ?? 'id'); ?>';
    let currentSortDirection = '<?php echo e($sortDirection ?? 'asc'); ?>';

    function toggleSort(column) {
        if (currentSortColumn === column) {
            currentSortDirection = currentSortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            currentSortColumn = column;
            currentSortDirection = 'asc';
        }

        liveSearch();
    }

    function liveSearch(page = 1) {
        const search = document.getElementById('search').value;
        const params = {
            search: search,
            page: page,
            sort: currentSortColumn,
            direction: currentSortDirection
        };
        const queryString = new URLSearchParams(params).toString();

        fetch(`<?php echo e(route('informasi.berita-artikel')); ?>?${queryString}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('berita-table-body');
                tbody.innerHTML = '';

                let startNumber = (data.current_page - 1) * data.per_page;
                data.data.forEach((item, index) => {
                    const row = `<tr>
                        <td>${startNumber + index + 1}</td>
                        <td><img src="/storage/${item.cover || 'path/to/default/cover.png'}" width="50" height="50" class="rounded"></td>
                        <td>${item.title}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editBerita('${item.id}')">Edit</button>
                            <button class="btn btn-danger" onclick="confirmDelete('${item.id}', '${item.title}')">Hapus</button>
                        </td>
                    </tr>`;
                    tbody.insertAdjacentHTML('beforeend', row);
                });

                // Update pagination links
                document.querySelector('.pagination-container').innerHTML = data.pagination;
            })
            .catch(error => console.error('Error:', error));
    }

    function clearForm() {
        document.getElementById('beritaForm').reset();
        document.getElementById('berita_id').value = '';
        document.getElementById('editBeritaModalLabel').textContent = 'Tambah Data Berita';
        document.getElementById('cover-preview').style.display = 'none';
        $('#editBeritaModal').modal('show');
    }

    function editBerita(id) {
        fetch(`/informasi/berita-artikel/${id}/edit`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('berita_id').value = data.id;
                document.getElementById('title').value = data.title;
                document.getElementById('content').value = data.content;

                if (data.cover) {
                    document.getElementById('cover-preview').src = `/storage/${data.cover}`;
                    document.getElementById('cover-preview').style.display = 'block';
                } else {
                    document.getElementById('cover-preview').style.display = 'none';
                }

                $('#editBeritaModal').modal('show');
            })
            .catch(error => console.error('Error:', error));
    }

    function confirmDelete(id, title) {
        const form = document.getElementById('deleteForm');
        form.action = `/informasi/berita-artikel/${id}`;
        document.getElementById('deleteConfirmText').innerHTML = `Apakah kamu yakin ingin menghapus berita <strong>"${title}"</strong>? Tindakan ini tidak dapat dibatalkan.`;
        $('#deleteConfirmModal').modal('show');
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/informasi/berita-artikel.blade.php ENDPATH**/ ?>