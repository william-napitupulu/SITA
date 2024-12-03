

<?php $__env->startSection('title', 'Sarana & Prasarana'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Sarana & Prasarana</h2>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold mb-0">Sarana & Prasarana</h3>
                <!-- Use onclick directly as in the Staff module -->
                <button class="btn btn-primary" onclick="clearForm()">Tambah Data</button>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <!-- Updated Search Placeholder -->
                <input type="text" class="form-control w-25" id="search" placeholder="Search by No, Nama..." onkeyup="liveSearch()">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No <i class="fas fa-sort sort-icon" onclick="toggleSort('id')" id="sort-id"></i></th>
                        <th>Cover</th>
                        <th>Nama <i class="fas fa-sort sort-icon" onclick="toggleSort('nama')" id="sort-nama"></i></th>
                        <th>Deskripsi</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody id="sarana-prasarana-table-body">
                    <?php
                        $startNumber = ($saranaPrasarana->currentPage() - 1) * $saranaPrasarana->perPage();
                        if ($sortColumn == 'id' && $sortDirection == 'desc') {
                            $number = $saranaPrasarana->total() - $startNumber;
                        } else {
                            $number = $startNumber;
                        }
                    ?>
                    <?php $__currentLoopData = $saranaPrasarana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <td><?php echo e($item->nama); ?></td>
                            <td><?php echo e($item->deskripsi); ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="editItem('<?php echo e($item->id); ?>')">Edit</button>
                                <button class="btn btn-danger" onclick="confirmDelete('<?php echo e($item->id); ?>', '<?php echo e($item->nama); ?>')">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="pagination-container">
                <?php echo e($saranaPrasarana->appends(request()->except('page'))->links()); ?>

            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="itemForm" action="<?php echo e(route('sarana-prasarana.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="item_id" name="item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Tambah Data</h5>
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
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" style="resize: both;"></textarea>
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
                    <h5 class="modal-title">Hapus Data</h5>
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

<!-- Styles for Sort Icons -->
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

        const params = {
            search: search,
            page: page
        };

        if (currentSortColumn && currentSortDirection) {
            params.sort = currentSortColumn;
            params.direction = currentSortDirection;
        }

        const queryString = new URLSearchParams(params).toString();

        fetch(`<?php echo e(route('sarana-prasarana.index')); ?>?${queryString}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('sarana-prasarana-table-body');
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
                    <td>${item.nama}</td>
                    <td>${item.deskripsi || ''}</td>
                    <td>
                        <button class="btn btn-warning" onclick="editItem('${item.id}')">Edit</button>
                        <button class="btn btn-danger" onclick="confirmDelete('${item.id}', '${item.nama}')">Hapus</button>
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

    function confirmDelete(id, nama) {
        const form = document.getElementById('deleteForm');
        form.action = `/sarana-prasarana/${id}`;
        document.getElementById('deleteConfirmText').innerHTML = `Apakah kamu yakin ingin menghapus data "<strong>${nama}</strong>"?`;
        $('#deleteConfirmModal').modal('show');
    }

    function clearForm() {
        document.getElementById('itemForm').reset();
        document.getElementById('item_id').value = '';
        document.getElementById('addItemModalLabel').textContent = 'Tambah Data';
        $('#addItemModal').modal('show');
    }

    function editItem(id) {
        fetch(`/sarana-prasarana/${id}/edit`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('item_id').value = data.id;
                document.getElementById('nama').value = data.nama;
                document.getElementById('deskripsi').value = data.deskripsi;
                document.getElementById('addItemModalLabel').textContent = 'Edit Data';
                $('#addItemModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                alert('Error fetching data. Please try again.');
            });
    }

    // Initialize event listeners
    document.getElementById('search').addEventListener('input', function() {
        liveSearch();
    });

    document.addEventListener('DOMContentLoaded', function() {
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/app/sarana_prasarana.blade.php ENDPATH**/ ?>