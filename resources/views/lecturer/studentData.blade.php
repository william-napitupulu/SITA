@extends('adminlte::page')

@section('title', 'Student Data')

@section('content_header')
<!-- Header Section -->
<div class="d-flex justify-content-between align-items-center px-3 py-2">
    <!-- Title Section -->
    <h5 class="mb-0" style="color: #4a90e2; font-weight: bold; font-size: 1.5rem;">Student Data</h5>
    
    <!-- Breadcrumbs Section -->
    <small class="breadcrumb mb-0 text-muted">
        <a href="#" class="text-secondary">Home</a> > <span>Student Data</span>
    </small>
</div>

<!-- Guidance Section -->
<div class="px-3 py-2 mt-2" style="background-color: #4a90e2; color: white; border-radius: 5px;">
    <p class="mb-0" style="font-size: 1rem;">Guidance Group with Supervising Lecturer</p>
</div>
@stop

@section('content')
<!-- Main Content -->
<div class="container bg-white p-4 mt-3 rounded shadow-sm">
    <!-- Supervisor Selection -->
    <div class="row align-items-center">
        <div class="col-md-3 text-end">
            <label for="supervisorDropdown" class="form-label" style="font-weight: bold;">Select Supervisor:</label>
        </div>
        <div class="col-md-9">
            <select id="supervisorDropdown" class="form-control">
                <option value="" selected>Select Supervisor...</option>
                <!-- Dynamic options will be populated here -->
            </select>
        </div>
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
