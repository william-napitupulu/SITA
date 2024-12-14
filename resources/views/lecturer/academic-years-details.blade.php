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
            <table class="table table-bordered">
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
                    @forelse ($filteredStudents as $key => $student)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $student['batch'] }}</td>
                            <td>{{ $student['nim'] }}</td>
                            <td>{{ $student['name'] }}</td>
                            
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
@endsection
