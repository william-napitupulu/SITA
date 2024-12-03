

<?php $__env->startSection('title', 'Profil: Alumni'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Profil: Alumni</h2>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold mb-0">Alumni</h3>
                <button class="btn btn-primary" onclick="clearForm()">Tambah Data</button>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <select class="form-control w-25" id="yearFilter" onchange="liveSearch()">
                    <option value="">All Years</option>
                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($year); ?>" <?php echo e($selectedYear == $year ? 'selected' : ''); ?>><?php echo e($year); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="text" class="form-control w-25" id="search" placeholder="Search by Nama, Jurusan, Tahun Lulus..." onkeyup="liveSearch()">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No <i class="fas fa-sort sort-icon" onclick="toggleSort('id')" id="sort-id"></i></th>
                        <th>Photo</th>
                        <th>Nama <i class="fas fa-sort sort-icon" onclick="toggleSort('nama')" id="sort-nama"></i></th>
                        <th>Jurusan <i class="fas fa-sort sort-icon" onclick="toggleSort('jurusan')" id="sort-jurusan"></i></th>
                        <th>Tahun Lulus <i class="fas fa-sort sort-icon" onclick="toggleSort('tahun_lulus')" id="sort-tahun_lulus"></i></th>
                        <th>Testimonial</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody id="alumni-table-body">
                    <?php
                        // Calculate the starting number based on the current page and items per page
                        $startNumber = ($alumni->currentPage() - 1) * $alumni->perPage();
                        // Determine numbering direction based on sorting
                        if ($sortColumn == 'id' && $sortDirection == 'desc') {
                            $number = $alumni->total() - $startNumber;
                        } else {
                            $number = $startNumber;
                        }
                    ?>
                    <?php $__currentLoopData = $alumni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($sortColumn == 'id' && $sortDirection == 'desc'): ?>
                                    <?php echo e($number - $loop->index); ?>

                                <?php else: ?>
                                    <?php echo e($number + $loop->iteration); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item->photo): ?>
                                    <img src="<?php echo e(asset('storage/' . $item->photo)); ?>" width="50" height="50" class="rounded">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($item->nama); ?></td>
                            <td><?php echo e($item->jurusan); ?></td>
                            <td><?php echo e($item->tahun_lulus); ?></td>
                            <td><?php echo e($item->testimonial); ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="editAlumni('<?php echo e($item->id); ?>')">Edit</button>
                                <button class="btn btn-danger" onclick="confirmDelete('<?php echo e($item->id); ?>', '<?php echo e($item->nama); ?>', '<?php echo e($item->tahun_lulus); ?>')">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="pagination-container">
                <?php echo e($alumni->appends(request()->except('page'))->links()); ?>

            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div class="modal fade" id="addAlumniModal" tabindex="-1" aria-labelledby="addAlumniModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="alumniForm" action="<?php echo e(route('alumni.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="alumni_id" name="alumni_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAlumniModalLabel">Tambah Data Alumni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun_lulus">Tahun Lulus</label>
                            <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control" required>
                                <option value="IPA">IPA (Ilmu Pengetahuan Alam)</option>
                                <option value="IPS">IPS (Ilmu Pengetahuan Sosial)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="testimonial">Testimonial</label>
                            <textarea name="testimonial" id="testimonial" class="form-control"></textarea>
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
                    <h5 class="modal-title">Hapus Data Alumni</h5>
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

        fetch(`<?php echo e(route('profile.alumni')); ?>?${queryString}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('alumni-table-body');
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
                    <td>${item.photo ? '<img src="/storage/' + item.photo + '" width="50" height="50" class="rounded">' : 'No Image'}</td>
                    <td>${item.nama}</td>
                    <td>${item.jurusan}</td>
                    <td>${item.tahun_lulus}</td>
                    <td>${item.testimonial || ''}</td>
                    <td>
                        <button class="btn btn-warning" onclick="editAlumni('${item.id}')">Edit</button>
                        <button class="btn btn-danger" onclick="confirmDelete('${item.id}', '${item.nama}', '${item.tahun_lulus}')">Hapus</button>
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

    function confirmDelete(id, nama, tahun_lulus) {
        const form = document.getElementById('deleteForm');
        form.action = `/profile/alumni/${id}`;
        document.getElementById('deleteConfirmText').innerHTML = `Apakah kamu yakin ingin menghapus alumni "<strong>${nama}</strong>" yang lulus pada tahun "<strong>${tahun_lulus}</strong>"?`;
        $('#deleteConfirmModal').modal('show');
    }

    function clearForm() {
        document.getElementById('alumniForm').reset();
        document.getElementById('alumni_id').value = '';
        document.getElementById('addAlumniModalLabel').textContent = 'Tambah Data Alumni';
        $('#addAlumniModal').modal('show');
    }

    function editAlumni(id) {
        fetch(`/profile/alumni/${id}/edit`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('alumni_id').value = data.id;
                document.getElementById('nama').value = data.nama;
                document.getElementById('tahun_lulus').value = data.tahun_lulus;
                document.getElementById('jurusan').value = data.jurusan;
                document.getElementById('testimonial').value = data.testimonial;
                document.getElementById('addAlumniModalLabel').textContent = 'Edit Data Alumni';
                $('#addAlumniModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching alumni data:', error);
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/app/alumni.blade.php ENDPATH**/ ?>