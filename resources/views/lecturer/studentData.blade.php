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

<div class="container-fluid mt-4">
    <h5 class="text-white p-3 rounded" style="background-color: #4285f4;">Guidance Group with Supervising Lecturer</h5>
@stop

@section('content')
<div class="container bg-white p-4 mt-3 rounded shadow-sm">
    <!-- Supervisor Selection -->
    <div class="mb-3">
        <label for="supervisorSelect" class="form-label"><strong>Select Supervisor:</strong></label>
        <select id="supervisorSelect" name="supervisor_id" class="form-select" required>
            <option value="">Select Supervisor...</option>
            @foreach($supervisors as $supervisor)
                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Group Name -->
    <h5 id="groupTitle" class="text-primary mb-3" style="display: none;">Group: <span id="groupName"></span></h5>

    <!-- Table of Students -->
    <div class="table-responsive" id="tableContainer" style="display: none;">
        <table id="studentTable" class="table table-bordered">
            <thead class="bg-light">
                <tr>
                    <th>#</th>
                    <th>Batch</th>
                    <th>NIM</th>
                    <th>Student Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $key => $student)
                    <tr data-supervisor="{{ $student->supervisor_id }}" data-group="{{ $student->group ?? '' }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $student->batch ?? '-' }}</td>
                        <td>{{ $student->nim ?? '-' }}</td>
                        <td>{{ $student->student->name ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
<style>
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

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 10px;
    }

    h5 {
        font-size: 1.5rem;
    }

    .rounded {
        border-radius: 5px;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    /* Group Title Styling */
    #groupTitle {
        font-size: 1.25rem;
        font-weight: bold;
    }

    /* Table Styling */
    .table {
        border: 1px solid #dee2e6;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
</style>
@stop

@section('js')
<!-- Include Select2 for Typeable Dropdown -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">

<script>
    $(document).ready(function () {
        // Make the Supervisor Dropdown typeable with Select2
        $('#supervisorSelect').select2({
            placeholder: "Select Supervisor...",
            allowClear: true
        });

        $('#supervisorSelect').on('change', function () {
            var selectedSupervisorId = $(this).val();
            var tableContainer = $('#tableContainer');
            var groupTitle = $('#groupTitle');
            var groupNameSpan = $('#groupName');

            if (selectedSupervisorId === '') {
                tableContainer.hide(); // Hide table if no supervisor is selected
                groupTitle.hide(); // Hide group title
            } else {
                tableContainer.show(); // Show table when supervisor is selected

                // Loop through rows and filter based on the selected supervisor
                var firstGroup = null;
                $('#studentTable tbody tr').each(function () {
                    var rowSupervisorId = $(this).data('supervisor');
                    var rowGroup = $(this).data('group');

                    if (rowSupervisorId == selectedSupervisorId) {
                        $(this).show();
                        if (!firstGroup) {
                            firstGroup = rowGroup; // Capture the group name
                        }
                    } else {
                        $(this).hide();
                    }
                });

                // Update Group Title
                if (firstGroup) {
                    groupNameSpan.text(firstGroup);
                    groupTitle.show();
                } else {
                    groupTitle.hide();
                }
            }
        });
    });
</script>
@stop
