@extends('adminlte::page')

@section('title', 'Assign Students')



@section('content')
<div class="container my-5">
    <h2 class="mb-4">Assign Students to Supervisors</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                                <input type="text" name="groups[{{ $student->student_id }}]" 
                                       value="{{ $student->group ?? '' }}" 
                                       class="form-control">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input student-checkbox" name="students[]" value="{{ $student->student_id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Assign Button -->
        <button type="button" id="assignButton" class="btn btn-primary mt-3">Assign</button>
    </form>
</div>

<!-- Modals -->
<!-- No Supervisor Modal -->
<div class="modal fade" id="noSupervisorModal" tabindex="-1" aria-labelledby="noSupervisorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noSupervisorModalLabel">Confirmation Required</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Please select a supervisor first!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Max Students Modal -->
<div class="modal fade" id="maxStudentsModal" tabindex="-1" aria-labelledby="maxStudentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="maxStudentsModalLabel">Confirmation Required</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You can only select a maximum of 3 students!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation Required</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to assign this supervisor?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmAssign">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const assignButton = document.getElementById('assignButton');
        const supervisorSelect = document.getElementById('supervisorSelect');
        const checkboxes = document.querySelectorAll('.student-checkbox');
        const form = document.getElementById('assignForm');

        const noSupervisorModal = new bootstrap.Modal(document.getElementById('noSupervisorModal'));
        const maxStudentsModal = new bootstrap.Modal(document.getElementById('maxStudentsModal'));
        const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));

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

            const confirmAssign = document.getElementById('confirmAssign');
            confirmAssign.onclick = function () {
                form.submit();
            };
        });
    });
</script>
@stop
