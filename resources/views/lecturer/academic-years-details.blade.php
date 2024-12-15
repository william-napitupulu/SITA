@extends('adminlte::page')

@section('title', 'Academic Year Details')

@section('content')
<div class="container">
    <h1 class="mb-4">Academic Year: {{ $year }}</h1>

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
                    <thead class="table-light">
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
