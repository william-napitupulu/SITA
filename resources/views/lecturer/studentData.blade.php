@extends('adminlte::page')

@section('title', 'Student Data')

@section('content_header')
<div class="d-flex flex-column align-items-center p-3 bg-white w-100">
    <h1 class="text-primary">Dashboard</h1>
    <small class="text-muted">Overview of the application</small>
</div>
@stop

@section('content')
<div class="container bg-white p-4 mt-4 rounded shadow-sm">
    <!-- Dropdown for Supervisor Selection -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <select id="supervisorDropdown" class="form-control">
                
            </select>
        </div>
    </div>

    <!-- Table for Students (Initially Empty) -->
    <div id="studentsTableContainer" class="mt-4"></div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    /* Optional: Add some spacing or styling here if needed */
    .form-control {
        width: 100%;
        max-width: 300px;
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
                    // Show the student data table
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
w