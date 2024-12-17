@extends('adminlte::page')

@section('title', 'Assign Student')

@section('content')
<div class="container-fluid p-0">
    <!-- Page Header -->
    <div class="row align-items-center mb-3 p-3 bg-light">
        <div class="col-6">
            <h2 class="text-primary">Assign Student</h2>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <small>
                <a href="#" class="text-muted">Home</a> > 
                <span class="text-muted">Assign Student</span>
            </small>
        </div>
    </div>

    <!-- Thesis Grouping Section -->
    <div class="row m-0">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header" style="background-color: #4a90e2; color: white;">
                    <strong>Thesis Grouping</strong>
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <!-- Label dan Dropdown Supervisor -->
                    <div class="d-flex align-items-center">
                        <label for="supervisorSelect" class="form-label mb-0 me-2">
                            <strong>Select Supervisor:</strong>
                        </label>
                        <select id="supervisorSelect" name="supervisor_id" class="form-control" style="width: 300px;" required>
                            <option value="">Select Supervisor...</option>
                            @foreach($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Tombol Assign ke kanan total -->
                    <div class="d-flex justify-content-end flex-grow-1">
                        <button type="button" id="assignButton" class="btn btn-success">Assign</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Table -->
    <div class="row m-0">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover w-100">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Batch</th>
                            <th>NIM</th>
                            <th>Student Name</th>
                            <th>Supervisor</th>
                            <th>Group</th>
                            <th>Select</th>
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
                                    <input type="text" name="groups[{{ $student->id }}]" 
                                           value="{{ $student->group ?? '' }}" 
                                           class="form-control">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input student-checkbox" name="students[]" value="{{ $student->id }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5 text-center bg-light p-3">
        <p class="text-muted">
            Sistem Informasi Tugas Akhir (SITA) Copyright © Developed by Group 6. All rights reserved.
        </p>
        <p class="text-muted">Version 1.0</p>
    </footer>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const assignButton = document.getElementById('assignButton');
        const supervisorSelect = document.getElementById('supervisorSelect');
        const checkboxes = document.querySelectorAll('.student-checkbox');

        const noSupervisorModal = new bootstrap.Modal(document.getElementById('noSupervisorModal'));

        assignButton.addEventListener('click', function () {
            const selectedSupervisor = supervisorSelect.value;

            if (!selectedSupervisor) {
                noSupervisorModal.show();
                return;
            }

            alert('Supervisor assigned successfully!');
        });
    });
</script>
@stop
