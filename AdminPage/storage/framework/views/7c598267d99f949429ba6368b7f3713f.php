<?php $__env->startSection('title', 'Profil: Staf Guru & Karyawan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Profil: Staf Guru & Karyawan</h2>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Large heading for "Staf Guru & Karyawan" on the left -->
                <h3 class="font-weight-bold mb-0">Staf Guru & Karyawan</h3>
                
                <!-- "Tambah Data" button on the right, directly above the search bar -->
                <button class="btn btn-primary" onclick="clearForm()">Tambah Data</button>
            </div>

            <!-- Search Bar aligned below the "Tambah Data" button -->
            <div class="d-flex justify-content-end mt-3">
                <input type="text" class="form-control w-25" id="search" placeholder="Search..."
                    onkeyup="liveSearch()">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No <i class="fas fa-sort sort-icon" onclick="toggleSort('id')" id="sort-id"></i></th>
                        <th>Photo</th>
                        <th>Nama <i class="fas fa-sort sort-icon" onclick="toggleSort('name')" id="sort-name"></i></th>
                        <th>Kelompok <i class="fas fa-sort sort-icon" onclick="toggleSort('group')" id="sort-group"></i>
                        </th>
                        <th>Jabatan <i class="fas fa-sort sort-icon" onclick="toggleSort('position')"
                                id="sort-position"></i></th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody id="staff-table-body">
                    <?php
                        $startNumber = ($staff->currentPage() - 1) * $staff->perPage();
                        if ($sortColumn == 'id' && $sortDirection == 'desc') {
                            $number = $staff->total() - $startNumber;
                        } else {
                            $number = $startNumber;
                        }
                    ?>
                    <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="staff-row-<?php echo e($person->id); ?>">
                            <td>
                                <?php if($sortColumn == 'id' && $sortDirection == 'desc'): ?>
                                    <?php echo e($number - $loop->index); ?>

                                <?php else: ?>
                                    <?php echo e($number + $loop->iteration); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($person->photo): ?>
                                    <img src="<?php echo e(asset('storage/' . $person->photo)); ?>" width="50" height="50" class="rounded">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('path/to/default/photo.png')); ?>" width="50" height="50" class="rounded">
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($person->name); ?></td>
                            <td><?php echo e($person->group); ?></td>
                            <td><?php echo e($person->position); ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="editStaff('<?php echo e($person->id); ?>')">Edit</button>
                                <button class="btn btn-danger"
                                    onclick="confirmDelete('<?php echo e($person->id); ?>', '<?php echo e($person->name); ?>', '<?php echo e($person->position); ?>')">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="pagination-container">
                <?php echo e($staff->appends(request()->except('page'))->links()); ?>

            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="staffForm" action="<?php echo e(route('staff.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="staff_id" name="staff_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStaffModalLabel">Tambah Data Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="group">Kelompok</label>
                        <select name="group" id="group" class="form-control" required>
                            <option value="Staff Guru">Staff Guru</option>
                            <option value="Karyawan">Karyawan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Jabatan</label>
                        <input type="text" name="position" id="position" class="form-control" required>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearForm()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Penghapusan</h5>
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

        fetch(`<?php echo e(route('profile.staff')); ?>?${queryString}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('staff-table-body');
                tbody.innerHTML = '';

                let startNumber = (data.current_page - 1) * data.per_page;
                let number;

                if (data.sortColumn === 'id' && data.sortDirection === 'desc') {
                    number = data.total - startNumber;
                } else {
                    number = startNumber;
                }

                data.data.forEach((person, index) => {
                    let displayNumber;
                    if (data.sortColumn === 'id' && data.sortDirection === 'desc') {
                        displayNumber = number - index;
                    } else {
                        displayNumber = number + index + 1;
                    }

                    const row = `<tr>
                        <td>${displayNumber}</td>
                        <td>${person.photo ? '<img src="/storage/' + person.photo + '" width="50" height="50" class="rounded">' : '<img src="/path/to/default/photo.png" width="50" height="50" class="rounded">'}</td>
                        <td>${person.name}</td>
                        <td>${person.group}</td>
                        <td>${person.position}</td>
                        <td>
                            <button class="btn btn-warning" onclick="editStaff('${person.id}')">Edit</button>
                            <button class="btn btn-danger" onclick="confirmDelete('${person.id}', '${person.name}', '${person.position}')">Hapus</button>
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

    function confirmDelete(id, name, position) {
        const form = document.getElementById('deleteForm');
        form.action = `/profile/staff/${id}`;
        document.getElementById('deleteConfirmText').innerHTML = `Apakah kamu yakin ingin menghapus staff <strong>"${name}"</strong> dengan jabatan <strong>"${position}"</strong>? Tindakan ini tidak dapat dibatalkan.`;
        $('#deleteConfirmModal').modal('show');
    }

    function clearForm() {
        document.getElementById('staffForm').reset();
        document.getElementById('staff_id').value = '';
        document.getElementById('addStaffModalLabel').textContent = 'Tambah Data Staff';
        $('#addStaffModal').modal('show');
    }

    function editStaff(id) {
        fetch(`/profile/staff/${id}/edit`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('staff_id').value = data.id;
                document.getElementById('name').value = data.name;
                document.getElementById('group').value = data.group;
                document.getElementById('position').value = data.position;
                document.getElementById('addStaffModalLabel').textContent = 'Edit Data Staff';
                $('#addStaffModal').modal('show');
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/app/staff.blade.php ENDPATH**/ ?>