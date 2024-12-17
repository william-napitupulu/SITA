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
                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-3">
                        <button type="button" id="assignButton" class="btn btn-success">Assign</button>
                        <button type="button" id="saveGroupsButton" class="btn btn-primary">Save Group Names</button>
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
                                    @if(!empty($student->supervisor))
                                        <!-- Editable group input -->
                                        <input type="text" name="groups[{{ $student->id }}]" 
                                               value="{{ $student->group ?? 'Group 1' }}" 
                                               class="form-control group-input">
                                    @else
                                        <!-- Display group name when not assigned -->
                                        {{ $student->group ?? '-' }}
                                    @endif
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
</div>

<!-- Modals Section -->
<div class="modal fade" id="confirmationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-exclamation-circle text-warning me-2"></i> Confirmation Required</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to assign these students?
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmAssign" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="noSupervisorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Error</h5>
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

<div class="modal fade" id="maxStudentsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Warning</h5>
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
        const saveGroupsButton = document.getElementById('saveGroupsButton');
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
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("assign.students.submit") }}';
                form.innerHTML = `@csrf<input type="hidden" name="supervisor_id" value="${selectedSupervisor}">
                    ${selectedStudents.map(student => `<input type="hidden" name="students[]" value="${student.value}">`).join('')}`;
                document.body.appendChild(form);
                form.submit();
            };
        });

        saveGroupsButton.addEventListener('click', function () {
            const groupInputs = document.querySelectorAll('.group-input');
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("save.group.names") }}';
            form.innerHTML = `@csrf`;
            groupInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    form.innerHTML += `<input type="hidden" name="groups[${input.name.split('[')[1].split(']')[0]}]" value="${input.value}">`;
                }
            });
            document.body.appendChild(form);
            form.submit();
        });
    });
</script>
@stop
