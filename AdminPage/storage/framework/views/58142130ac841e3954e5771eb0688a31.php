

<?php $__env->startSection('title', 'Logs: Catatan Perubahan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Logs: Catatan Perubahan</h2>
    <div class="card">
        <div class="card-header">
            <!-- Search Bar -->
            <div class="d-flex justify-content-end">
                <input type="text" class="form-control w-25" id="search" placeholder="Search..." onkeyup="liveSearch()">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No <i class="fas fa-sort sort-icon" onclick="toggleSort('id')" id="sort-id"></i></th>
                        <th>Pesan <i class="fas fa-sort sort-icon" onclick="toggleSort('message')" id="sort-message"></i></th>
                        <th>Tanggal <i class="fas fa-sort sort-icon" onclick="toggleSort('created_at')" id="sort-created_at"></i></th>
                    </tr>
                </thead>
                <tbody id="logs-table-body">
                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(($logs->currentPage() - 1) * $logs->perPage() + $loop->iteration); ?></td>
                            <td><?php echo e($log->message); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($log->created_at)->translatedFormat('d F Y H:i')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="pagination-container d-flex justify-content-center">
                <?php echo $logs->appends(request()->except('page'))->links('pagination::bootstrap-4'); ?>

            </div>
        </div>
    </div>
</div>

<!-- Styles untuk Sort Icons dan Pagination -->
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

    /* Styling Pagination */
    .pagination .page-item .page-link {
        padding: 0.5rem 0.75rem;
        margin: 0 2px;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        color: #007bff;
        text-decoration: none;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }
</style>

<!-- Bagian JavaScript -->
<script>
    let currentSortColumn = '<?php echo e($sortColumn ?? ''); ?>';
    let currentSortDirection = '<?php echo e($sortDirection ?? ''); ?>';

    // Jika sortir default diterapkan (created_at desc), reset sortColumn dan sortDirection agar ikon sortir tidak aktif
    if (currentSortColumn === 'created_at' && currentSortDirection === 'desc') {
        currentSortColumn = '';
        currentSortDirection = '';
    }

    function toggleSort(column) {
        if (currentSortColumn === column) {
            if (currentSortDirection === 'asc') {
                currentSortDirection = 'desc';
            } else if (currentSortDirection === 'desc') {
                // Kembali ke sortir default
                currentSortColumn = '';
                currentSortDirection = '';
            } else {
                currentSortDirection = 'asc';
            }
        } else {
            currentSortColumn = column;
            currentSortDirection = 'asc';
        }

        // Update ikon sortir
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

        fetch(`<?php echo e(route('logs.index')); ?>?${queryString}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('logs-table-body');
                tbody.innerHTML = '';

                let startNumber = (data.current_page - 1) * data.per_page;
                let number;

                if ((data.sortColumn === 'created_at' && data.sortDirection === 'desc') || !data.sortColumn) {
                    number = startNumber;
                } else if (data.sortColumn === 'id' && data.sortDirection === 'desc') {
                    number = data.total - startNumber;
                } else {
                    number = startNumber;
                }

                data.data.forEach((log, index) => {
                    let displayNumber;
                    if ((data.sortColumn === 'created_at' && data.sortDirection === 'desc') || !data.sortColumn) {
                        displayNumber = number + index + 1;
                    } else if (data.sortColumn === 'id' && data.sortDirection === 'desc') {
                        displayNumber = number - index;
                    } else {
                        displayNumber = number + index + 1;
                    }

                    const date = new Date(log.created_at);
                    const formattedDate = date.toLocaleString('id-ID', {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    const row = `<tr>
                        <td>${displayNumber}</td>
                        <td>${log.message}</td>
                        <td>${formattedDate}</td>
                    </tr>`;
                    tbody.insertAdjacentHTML('beforeend', row);
                });

                // Update pagination links
                const paginationContainer = document.querySelector('.pagination-container');
                if (paginationContainer) {
                    paginationContainer.innerHTML = data.pagination;
                }

                // Re-attach event listener untuk pagination links
                document.querySelectorAll('.pagination a').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const urlParams = new URLSearchParams(this.getAttribute('href').split('?')[1]);
                        const page = urlParams.get('page');
                        liveSearch(page);
                    });
                });

                // Update currentSortColumn dan currentSortDirection berdasarkan data yang diterima
                currentSortColumn = data.sortColumn;
                currentSortDirection = data.sortDirection;

                // Jika sortir default diterapkan, reset sortColumn dan sortDirection
                if (currentSortColumn === 'created_at' && currentSortDirection === 'desc') {
                    currentSortColumn = '';
                    currentSortDirection = '';
                }

                // Update ikon sortir
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

    // Inisialisasi event listeners saat DOM telah dimuat
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('search').addEventListener('input', function() {
            liveSearch();
        });

        // Attach click event ke pagination links saat awal page dimuat
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marti\Documents\GitHub\pabwe-pkm-proyek-2024-k1\AdminPage\resources\views/app/logs.blade.php ENDPATH**/ ?>