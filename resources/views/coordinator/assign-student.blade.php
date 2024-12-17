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
                    <!-- Label and Dropdown Supervisor -->
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
                    <!-- Assign Button -->
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

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header bg-white border-0">
                <h5 class="modal-title fw-bold" id="confirmationModalLabel" style="font-size: 1.2rem;">
                    <i class="fa fa-exclamation-circle text-warning me-2" style="font-size: 1.5rem;"></i>
                    Confirmation Required !
                </h5>
            </div>
            <div class="modal-body">
                <p class="mb-4" style="font-size: 1rem;">Are you sure you want to assign this supervisor?</p>
                <div class="d-flex justify-content-center gap-3">
                    <button type="button" id="confirmAssign" class="btn btn-success" style="width: 80px;">Yes</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 80px;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Supervisor Not Selected Modal -->
<div class="modal fade" id="noSupervisorModal" tabindex="-1" aria-labelledby="noSupervisorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="noSupervisorModalLabel"><i class="fa fa-exclamation-triangle me-2"></i> Error</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Please select a supervisor before assigning students!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Max Students Exceeded Modal -->
<div class="modal fade" id="maxStudentsModal" tabindex="-1" aria-labelledby="maxStudentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="maxStudentsModalLabel"><i class="fa fa-exclamation-triangle me-2"></i> Warning</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You can only assign a maximum of 3 students to a supervisor!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const assignButton = document.getElementById('assignButton');
        const supervisorSelect = document.getElementById('supervisorSelect');
        const checkboxes = document.querySelectorAll('.student-checkbox');

        const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        const noSupervisorModal = new bootstrap.Modal(document.getElementById('noSupervisorModal'));
        const maxStudentsModal = new bootstrap.Modal(document.getElementById('maxStudentsModal'));

        const confirmAssign = document.getElementById('confirmAssign');
        
        assignButton.addEventListener('click', function () {
            const selectedSupervisor = supervisorSelect.value;
            const selectedStudents = Array.from(checkboxes).filter(cb => cb.checked);

            if (!selectedSupervisor) {
                noSupervisorModal.show();
                return;
            }

            if (selectedStudents.length > 3) {
                maxStudentsModal.show();
                return;
            }

            confirmationModal.show();

            confirmAssign.onclick = function () {
                // Logic to submit the form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("assign.students.submit") }}';
                form.innerHTML = `
                    @csrf
                    <input type="hidden" name="supervisor_id" value="${selectedSupervisor}">
                    ${selectedStudents.map(student => `<input type="hidden" name="students[]" value="${student.value}">`).join('')}
                `;
                document.body.appendChild(form);
                form.submit();
            };
        });
    });
</script>
@stop
