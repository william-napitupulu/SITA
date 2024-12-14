@extends('adminlte::page')

@section('title', 'Academic Year')

@section('content_header')
<div class="d-flex flex-column align-items-center p-3 bg-white w-100">
    <h1 class="text-primary">Academic Year</h1>
    <small class="text-muted">Select and view student data by academic year</small>
</div>
@stop

@section('content')
<div class="container bg-white p-4 mt-4 rounded shadow-sm">
    <!-- Academic Year Section -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <h4>Select Academic Year</h4>
            <select id="academicYearDropdown" class="form-control">
                <option value="">Select to View</option>
                <option value="2017/2018">2017/2018</option>
                <option value="2018/2019">2018/2019</option>
                <option value="2019/2020">2019/2020</option>
                <option value="2020/2021">2020/2021</option>
                <option value="2021/2022">2021/2022</option>
                <option value="2022/2023">2022/2023</option>
                <option value="2023/2024">2023/2024</option>
                <option value="2024/2025">2024/2025</option>
            </select>
        </div>
    </div>

    <!-- Table for Students (Initially Empty) -->
    <div id="studentsTableContainer" class="mt-4">
        <!-- Student data will be dynamically loaded here based on the selected academic year -->
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .form-control {
        width: 100%;
        max-width: 300px;
        margin-bottom: 20px;
    }

    .table {
        margin-top: 20px;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-danger {
        background-color: #dc3545;
    }

    .badge-warning {
        background-color: #ffc107;
    }

    .container {
        max-width: 800px;
        margin: auto;
    }

    .d-flex {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Fetch student data based on academic year selection
    $('#academicYearDropdown').change(function() {
        var academicYear = $(this).val();
        if (academicYear) {
            $.ajax({
                url: '/get-students-by-academic-year/' + academicYear,
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
            // Clear the table if no academic year is selected
            $('#studentsTableContainer').html('');
        }
    });
</script>
@stop
