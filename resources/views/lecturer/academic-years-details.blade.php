@extends('adminlte::page')

@section('title', 'Academic Year Details')

@section('content')


<div class="container">
    <div class="full-width-header bg-light shadow-sm p-3">
        <div class="d-flex justify-content-between align-items-center px-3">
            <h1 class="header-title thesis-header mb-0">Academic Year: {{ $year }}</h1>
        
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Student Data for {{ $year }}</h3>
        </div>
        <div class="card-body">
            <!-- Search Input -->
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search by NIM, Name, or Supervisor">
            </div>

            <!-- Table for Student Data -->
            <div class="table-responsive">
                <table class="table table-bordered" id="studentTable">
                    <thead class="table-light bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Batch</th>
                            <th>NIM</th>
                            <th>Student Name</th>
                            <th>Supervisor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $key => $student)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $student->batch ?? '-' }}</td>
                                <td>{{ $student->nim ?? '-' }}</td>
                                <td>{{ $student->student->name ?? '-' }}</td>
                                <td>{{ $student->supervisor->name ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <i class="fas fa-info-circle"></i> No students found for {{ $year }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('css')
<style>

.full-width-header {
  width: calc(90% - 100px); /* Subtract sidebar width */
  width: 100%;
  background-color: #FFFFFF !important;
  border-bottom: 1px solid #dee2e6;
  margin-bottom: 30px; /* Remove negative margins */
  padding: 0; /* Remove default padding */
  position: relative;
  z-index: 10;
}
.full-width-header .thesis-header {
  font-family: 'Inter', sans-serif;
  font-weight: 700 !important;
  /* Ubah menjadi bold */
  color: #0079C2;
  /* Warna biru */
  font-size: 1.8rem;
  /* Ukuran font lebih besar */
  margin-left: 0 !important;
  /* Dekatkan ke kiri */
  margin-right: 0;
  /* Tidak ada jarak di kanan */
}

</style>
@stop

<!-- JavaScript for Search -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('studentTable');
        const rows = table.querySelectorAll('tbody tr');

        searchInput.addEventListener('keyup', function () {
            const query = this.value.toLowerCase();

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(query));

                if (match) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
