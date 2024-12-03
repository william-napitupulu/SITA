

<?php $__env->startSection('title', 'Profil: Prestasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Profil: Prestasi</h2>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold mb-0">Prestasi</h3>
                <button class="btn btn-primary" onclick="clearForm()">Tambah Data</button>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <select class="form-control w-25" id="yearFilter" onchange="liveSearch()">
                    <option value="">All Years</option>
                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($year); ?>" <?php echo e($selectedYear == $year ? 'selected' : ''); ?>><?php echo e($year); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="text" class="form-control w-25" id="search" placeholder="Search by Judul or Tahun..." onkeyup="liveSearch()">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No <i class="fas fa-sort sort-icon" onclick="toggleSort('id')" id="sort-id"></i></th>
                        <th>Cover</th>
                        <th>Judul <i class="fas fa-sort sort-icon" onclick="toggleSort('judul')" id="sort-judul"></i></th>
                        <th>Tahun Perolehan <i class="fas fa-sort sort-icon" onclick="toggleSort('tahun_perolehan')" id="sort-tahun_perolehan"></i></th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody id="prestasi-table-body">
                    <?php
                        // Calculate the starting number based on the current page and items per page
                        $startNumber = ($prestasi->currentPage() - 1) * $prestasi->perPage();
                        // Determine numbering direction based on sorting
                        if ($sortColumn == 'id' && $sortDirection == 'desc') {
                            $number = $prestasi->total() - $startNumber;
                        } else {
                            $number = $startNumber;
                        }
                    ?>
                    <?php $__currentLoopData = $prestasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($sortColumn == 'id' && $sortDirection == 'desc'): ?>
                                    <?php echo e($number - $loop->index); ?>

                                <?php else: ?>
                                    <?php echo e($number + $loop->iteration); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item->cover): ?>
                                    <img src="<?php echo e(asset('storage/' . $item->cover)); ?>" width="50" height="50" class="rounded">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($item->judul); ?></td>
                            <td><?php echo e($item->tahun_perolehan); ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="editPrestasi('<?php echo e($item->id); ?>')">Edit</button>
                                <button class="btn btn-danger" onclick="confirmDelete('<?php echo e($item->id); ?>', '<?php echo e($item->judul); ?>')">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="pagination-container">
                <?php echo e($prestasi->appends(request()->except('page'))->links()); ?>

            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div class="modal fade" id="addPrestasiModal" tabindex="-1" aria-labelledby="addPrestasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="prestasiForm" action="<?php echo e(route('prestasi.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="prestasi_id" name="prestasi_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPrestasiModalLabel">Tambah Data Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cover">Cover</label>
                            <input type="file" name="cover" id="cover" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun_perolehan">Tahun Perolehan</label>
                            <input type="number" name="tahun_perolehan" id="tahun_perolehan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearForm()">Batal</button>
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
                    <h5 class="modal-title">Hapus Data Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm()">
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

<!-- JavaScript Section -->
<script>
    let currentSortColumn = '<?php echo e($sortColumn ?? ''); ?>';
    let currentSortDirection = '<?php echo e($sortDirection ?? ''); ?>';

    function toggleSort(column) {
        if (currentSortColumn === column) {
            if (currentSortDirection === 'asc') {
                currentSortDirection = 'desc';
            } else if (currentSortDirection === 'desc') {
                currentSortColumn = '';
                currentSortDirection = '';
            } else {
                currentSortDirection = 'asc';
            }
        } else {
            currentSortColumn = column;
            currentSortDirection = 'asc';
        }

        document.querySelectorAll('.sort-icon').forEach(icon => icon.classList.remove('active', 'asc', 'desc'));
        if (currentSortColumn) {
            const icon = document.getElementById(`sort-${currentSortColumn}`);
            if (icon) {
                icon.classList.add('active', currentSortDirection);
            }
        }

        liveSearch();
    }

    function liveSearch(page = 1) {
        const search = document.getElementById('search').value;
        const tahun = document.getElementById('yearFilter').value;

        const params = {
            search: search,
            tahun: tahun,
            page: page
        };

        if (currentSortColumn && currentSortDirection) {
            params.sort = currentSortColumn;
            params.direction = currentSortDirection;
        }

        const queryString = new URLSearchParams(params).toString();

        fetch(`<?php echo e(route('profile.prestasi')); ?>?${queryString}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('prestasi-table-body');
            tbody.innerHTML = '';

            let startNumber = (data.current_page - 1) * data.per_page;
            let number;

            if (data.sortColumn === 'id' && data.sortDirection === 'desc') {
                number = data.total - startNumber;
            } else {
                number = startNumber;
            }

            data.data.forEach((item, index) => {
                let displayNumber;
                if (data.sortColumn === 'id' && data.sortDirection === 'desc') {
                    displayNumber = number - index;
                } else {
                    displayNumber = number + index + 1;
                }

                const row = `<tr>
                    <td>${displayNumber}</td>
                    <td>${item.cover ? '<img src="/storage/' + item.cover + '" width="50" height="50" class="rounded">' : 'No Image'}</td>
                    <td>${item.judul}</td>
                    <td>${item.tahun_perolehan}</td>
                    <td>
                        <button class="btn btn-warning" onclick="editPrestasi('${item.id}')">Edit</button>
                        <button class="btn btn-danger" onclick="confirmDelete('${item.id}', '${item.judul}')">Hapus</button>
                    </td>
                </tr>`;
                tbody.insertAdjacentHTML('beforeend', row);
            });

            // Update pagination links
            const paginationContainer = document.querySelector('.pagination-container');
            if (paginationContainer) {
                paginationContainer.innerHTML = data.pagination;
            } else {
                const cardBody = document.querySelector('.card-body');
                const paginationDiv = document.createElement('div');
                paginationDiv.classList.add('pagination-container');
                paginationDiv.innerHTML = data.pagination;
                cardBody.appendChild(paginationDiv);
            }

            // Attach click event to pagination links
            document.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const urlParams = new URLSearchParams(this.getAttribute('href').split('?')[1]);
                    const page = urlParams.get('page');
                    liveSearch(page);
                });
            });

            // Update currentSortColumn and currentSortDirection based on returned data
            currentSortColumn = data.sortColumn;
            currentSortDirection = data.sortDirection;

            // Update sort icons
            document.querySelectorAll('.sort-icon').forEach(icon => icon.classList.remove('active', 'asc', 'desc'));
            if (currentSortColumn) {
                const icon = document.getElementById(`sort-${currentSortColumn}`);
                if (icon) {
                    icon.classList.add('active', currentSortDirection);
                }
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function confirmDelete(id, judul) {
        const form = document.getElementById('deleteForm');
        form.action = `/profile/prestasi/${id}`;
        document.getElementById('deleteConfirmText').innerHTML = `Apakah Anda yakin ingin menghapus Prestasi dengan judul "<strong>${judul}</strong>"? Tindakan ini tidak dapat dibatalkan.`;
        $('#deleteConfirmModal').modal('show');
    }

    function clearForm() {
        document.getElementById('prestasiForm').reset();
        document.getElementById('prestasi_id').value = '';
        document.getElementById('addPrestasiModalLabel').textContent = 'Tambah Data Prestasi';
        $('#addPrestasiModal').modal('show');
    }

    function editPrestasi(id) {
        fetch(`/profile/prestasi/${id}/edit`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json()
            })
            .then(data => {
                document.getElementById('prestasi_id').value = data.id;
                document.getElementById('judul').value = data.judul;
                document.getElementById('tahun_perolehan').value = data.tahun_perolehan;
                document.getElementById('deskripsi').value = data.deskripsi;
                document.getElementById('addPrestasiModalLabel').textContent = 'Edit Data Prestasi';
                $('#addPrestasiModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching prestasi data:', error);
                alert('Error fetching data. Please try again.');
            });
    }

    // Initialize event listeners
    document.getElementById('search').addEventListener('input', function() {
        liveSearch();
    });
    document.getElementById('yearFilter').addEventListener('change', function() {
        liveSearch();
    });

    // Reset sort icons on page load
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.sort-icon').forEach(icon => icon.classList.remove('active', 'asc', 'desc'));
        if (currentSortColumn) {
            const icon = document.getElementById(`sort-${currentSortColumn}`);
            if (icon) {
                icon.classList.add('active', currentSortDirection);
            }
        }

        // Attach click event to pagination links on initial page load
        document.querySelectorAll('.pagination a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const urlParams = new URLSearchParams(this.getAttribute('href').split('?')[1]);
                const page = urlParams.get('page');
                liveSearch(page);
            });
        });
    });
</script>

<style>
    .sort-icon {
        opacity: 0.6;
        cursor: pointer;
        margin-left: 5px;
    }

    .sort-icon.active.asc {
        color: #007bff;
    }

    .sort-icon.active.desc {
        color: #007bff;
        transform: rotate(180deg);
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/app/prestasi.blade.php ENDPATH**/ ?>