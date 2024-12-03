@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between align-items-center p-3 bg-white w-100">
  <div class="page-title">
    <h1 class="mr-2 text-primary">Dashboard</h1>
  </div>
  <small class="text-muted">Home > Dashboard</small>
</div>
@stop

@section('content')

<div class="d-flex justify-content-center align-items-center p-3 bg-white w-100">
  <!-- Welcome to Sita Banner (Styled to match the image) -->
  <div class="row justify-content-center mb-4 w-100">
    <div class="col-md-12 text-center">
      <div class="alert text-center">
        <h2 class="d-inline-block align-middle ml-3">Welcome to Sita (Sistem Informasi Tugas Akhir) - FITE</h2>
      </div>
    </div>
  </div>
</div>

<div class="container bg-white p-4 mt-4 rounded shadow-sm">

  <div class="row justify-content-center mb-4">
    <!-- Active Students -->
    <div class="col-md-4 col-sm-6 mb-3">
      <div class="card text-center">
        <div class="card-header text-black">
          <h3 class="card-title">Active Students</h3>
        </div>
        <div class="card-body">
          <h4 class="mb-3">{{ $activeStudentsCount }}</h4> <!-- Display Active Students Count -->
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
          <h4 class="mb-3">{{ $activeLecturersCount }}</h4> <!-- Display Active Lecturers Count -->
        </div>
      </div>
    </div>
  </div>

  <!-- Chart for Students Passed Each Year -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-black">
          <h3 class="card-title text-center">Number of Graduates per Academic Year</h3>
        </div>
        <div class="card-body text-center">
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
  #studentsPassedChart {
    max-width: 100%;    /* Ensure the chart takes the full width of its parent container */
    height: 350px;      /* Define the height of the chart */
    margin: 0 auto;     /* Centers the chart horizontally */
}

  .btn-primary {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .container {
    max-width: 1200px;
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
  .row.justify-content-center {
    justify-content: center !important;
  }
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Data passed from the controller
  const passingStudentsPerYear = @json($passingStudentsPerYear);
  const yearData = Object.keys(passingStudentsPerYear);  // Get years (2013-2020)
  const passedData = Object.values(passingStudentsPerYear);  // Get the student counts for each year

  // Initialize the Chart.js chart
  const ctx = document.getElementById('studentsPassedChart').getContext('2d');
  const studentsPassedChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: yearData,
      datasets: [{
        label: 'Students Who Passed',
        data: passedData,
        borderColor: '#007bff',
        fill: false,
        tension: 0.1,
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
