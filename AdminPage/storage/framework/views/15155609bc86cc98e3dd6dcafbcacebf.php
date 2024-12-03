<?php $__env->startSection('title', 'Informasi: Galeri'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Informasi: Galeri</h2>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold mb-0">Galeri</h3>
                <button class="btn btn-primary" onclick="clearForm()" data-toggle="modal" data-target="#addGaleriModal">Tambah Data</button>
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
                        <th>Photo</th>
                        <th>Keterangan <i class="fas fa-sort sort-icon" onclick="toggleSort('description')" id="sort-description"></i></th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody id="galeri-table-body">
                    <?php
                        $startNumber = ($galeris->currentPage() - 1) * $galeris->perPage();
                    ?>
                    <?php $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="galeri-row-<?php echo e($galeri->id); ?>">
                            <td><?php echo e($startNumber + $loop->iteration); ?></td>
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
            <div class="pagination-container">
                <?php echo e($galeris->appends(request()->except('page'))->links()); ?>

            </div>
        </div>
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

        fetch(`<?php echo e(route('informasi.galeri')); ?>?${queryString}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('galeri-table-body');
                tbody.innerHTML = '';

                let startNumber = (data.current_page - 1) * data.per_page;
                data.data.forEach((galeri, index) => {
                    const row = `<tr>
                        <td>${startNumber + index + 1}</td>
                        <td><img src="/storage/${galeri.photo || 'path/to/default/image.png'}" width="50" height="50" class="rounded"></td>
                        <td>${galeri.description}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editGaleri('${galeri.id}')">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete('${galeri.id}', '${galeri.description}')">Hapus</button>
                        </td>
                    </tr>`;
                    tbody.insertAdjacentHTML('beforeend', row);
                });

                document.querySelector('.pagination-container').innerHTML = data.pagination;
            })
            .catch(error => console.error('Error:', error));
    }

    function clearForm() {
        document.getElementById('galeriForm').reset();
        document.getElementById('galeri_id').value = '';
        document.getElementById('addGaleriModalLabel').textContent = 'Tambah Data Galeri';
        document.getElementById('photo-preview').style.display = 'none';
        $('#addGaleriModal').modal('show');
    }

    function editGaleri(id) {
        fetch(`/informasi/galeri/${id}/edit`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('galeri_id').value = data.id;
                document.getElementById('description').value = data.description;

                if (data.photo) {
                    document.getElementById('photo-preview').src = `/storage/${data.photo}`;
                    document.getElementById('photo-preview').style.display = 'block';
                } else {
                    document.getElementById('photo-preview').style.display = 'none';
                }

                $('#addGaleriModal').modal('show');
            })
            .catch(error => console.error('Error:', error));
    }

    function confirmDelete(id, description) {
        const form = document.getElementById('deleteForm');
        form.action = `/informasi/galeri/${id}`;
        document.getElementById('deleteConfirmText').innerHTML = `Apakah kamu yakin ingin menghapus galeri <strong>"${description}"</strong>?`;
        $('#deleteConfirmModal').modal('show');
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/informasi/galeri.blade.php ENDPATH**/ ?>