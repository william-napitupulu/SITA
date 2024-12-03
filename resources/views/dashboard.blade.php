@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between align-items-center p-3 bg-white w-100">
  <div class="page-title">
    <h1 class="mr-2 text-primary">Dashboard</h1>
  </div>
  <small class="text-muted">text</small>
</div>
@stop

@section('content')
<div class="container bg-white p-4 mt-4 rounded shadow-sm">
  <div class="row justify-content-center mb-4">
    <!-- Active Students -->
    <div class="col-md-4 col-sm-6 mb-3">
      <div class="card text-center">
        <div class="card-header text-black">
          <h3 class="card-title">Active Students</h3>
        </div>
        <div class="card-body">
          <h4 class="mb-3">500</h4> <!-- Static Number for Active Students -->
        </div>
      </div>
    </div>

    <!-- Active Lecturers -->
    <div class="col-md-4 col-sm-6 mb-3">
      <div class="card text-center">
        <div class="card-header text-black">
          <h3 class="card-title">Active Lecturers</h3>
        </div>
        <div class="card-body">
          <h4 class="mb-3">120</h4> <!-- Static Number for Active Lecturers -->
        </div>
      </div>
    </div>
  </div>

  <!-- Chart for Students Passed Each Year -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-black">
          <h3 class="card-title">Students Who Passed Each Year</h3>
        </div>
        <div class="card-body">
          <canvas id="studentsPassedChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
  /* Custom styles for the Thesis Handbook Page */
  
  .content-header {
    padding: 0 !important; /* Removes padding from the container */
  }

  .content-header .container-fluid {
    padding-left: 0; /* Removes left padding */
    padding-right: 0; /* Removes right padding */
  }

  .card-header {
    font-weight: bold;
  }

  .card-body p {
    margin: 0;
  }

  .card-title {
    font-size: 24px;
  }

  .card-body th {
    background-color: #CFE2FF;
  }

  #studentsPassedChart {
    width: 100%;
    height: 300px;
  }

  .container {
    max-width: 1200px;
  }

  .page-title {
    color: #007bff;
  }

  .card {
    border-radius: 10px;
  }

  .card-body h4 {
    font-size: 2rem;
    font-weight: bold;
  }

  .card-header {
    background-color: #f8f9fa;
  }

  .card-body {
    background-color: #ffffff;
  }

  /* Align content to the center */
  .row.justify-content-center {
    justify-content: center !important;
  }

  /* Style for the chart */
  #studentsPassedChart {
    width: 100%;
    height: 350px;
  }

</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Static data for Students Passed Each Year
  const yearData = [2019, 2020, 2021, 2022, 2023];
  const passedData = [350, 400, 450, 500, 550]; // Static data of students who passed each year

  // Initialize the Chart.js chart
  const ctx = document.getElementById('studentsPassedChart').getContext('2d');
  const studentsPassedChart = new Chart(ctx, {
    type: 'line', // Line chart to show trends over the years
    data: {
      labels: yearData,
      datasets: [{
        label: 'Students Who Passed',
        data: passedData,
        borderColor: '#007bff',
        fill: false,
        tension: 0.1, // Smooth curve
      }]
    },
    options: {
      responsive: true,
      scales: {
        x: {
          title: {
            display: true,
            text: 'Year'
          }
        },
        y: {
          title: {
            display: true,
            text: 'Number of Students'
          },
          beginAtZero: true
        }
      }
    }
  });
</script>
@stop
