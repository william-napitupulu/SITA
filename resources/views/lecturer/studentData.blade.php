@extends('adminlte::page')

@section('title', 'Student Data')


@section('content_header')
<div class="p-3 bg-white w-100 d-flex justify-content-between align-items-center">
    <!-- Title Section -->
    <h1 class="text-primary font-weight-bold mb-0">Student Data</h1>
    
    <!-- Breadcrumbs Section -->
    <small class="breadcrumb mb-0 text-muted">
        <a href="#" class="text-secondary">Home</a> > <span>Student Data</span>
    </small>
</div>


<!-- Guidance Section -->
<div class="container-fluid mt-4">
    <!-- Judul dengan Latar Biru -->
    <h5 class="text-white p-3 rounded" style="background-color: #4285f4;">Guidance Group with Supervising Lecturer</h5>
    
@stop

@section('content')
<!-- Main Content -->
<div class="container bg-white p-4 mt-3 rounded shadow-sm">
    <!-- Supervisor Selection -->
    <form id="assignForm" method="POST" action="{{ route('assign.students.submit') }}">
        @csrf
        <div class="mb-3">
            <label for="supervisorSelect" class="form-label"><strong>Select Supervisor:</strong></label>
            <select id="supervisorSelect" name="supervisor_id" class="form-select" required>
                <option value="">Select Supervisor...</option>
                @foreach($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                @endforeach
            </select>
        </div>

     <!-- Table of Students -->
     <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Batch</th>
                        <th>NIM</th>
                        <th>Student Name</th>
                        <th>Supervisor</th>
                        <th>Group</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $key => $student)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $student->batch ?? '-' }}</td>
                            <td>{{ $student->nim ?? '-' }}</td>
                            <td>{{ $student->student->name ?? '-' }}</td>
                            <td>{{ $student->supervisor->name ?? '-' }}</td>
                            <td>
                                <input type="text" name="groups[{{ $student->student_id }}]" 
                                       value="{{ $student->group ?? '' }}" 
                                       class="form-control">
                            </td>
                            <td class="text-center">
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    <!-- Placeholder for Student Data Table -->
    <div id="studentsTableContainer" class="mt-4"></div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    /* Breadcrumb Styles */
    .breadcrumb {
        text-align: right;
    }

    .breadcrumb a {
        text-decoration: none;
        color: #6c757d;
    }

    .breadcrumb span {
        font-weight: bold;
    }

    /* Rounded Style */
    .rounded {
        border-radius: 5px;
    }

    /* Form Styles */
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 10px;
    }

    label {
        display: inline-block;
        margin-bottom: 5px;
        color: #333;
    }

    /* Title Alignment */
    h5 {
        font-size: 1.5rem; /* Larger font size for Student Data */
    }

    p {
        font-size: 1rem; /* Standard font size for Guidance text */
        margin-top: 5px;
    }

    .bg-primary {
        background-color: #4a90e2 !important;
        color: white;
    }
</style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // AJAX call to fetch students based on supervisor selection
    $('#supervisorDropdown').change(function() {
        var supervisorId = $(this).val();
        if (supervisorId) {
            $.ajax({
                url: '/get-students/' + supervisorId,
                method: 'GET',
                success: function(response) {
                    // Update the student data table
                    $('#studentsTableContainer').html(response);
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        } else {
            // Clear the table if no supervisor is selected
            $('#studentsTableContainer').html('');
        }
    });
</script>
@stop
