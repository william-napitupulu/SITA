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
<div class="container bg-white p-4 mt-4 rounded shadow-sm">
  <!-- Welcome Banner -->
  <div class="row justify-content-center mb-4">
    <div class="col-md-12">
      <div class="welcome-banner shadow rounded p-4 text-center">
        <h2 class="welcome-title text-primary">Welcome to SITA (Sistem Informasi Tugas Akhir) - FITE</h2>
      </div>
    </div>
  </div>

  <!-- Statistics Cards -->
  <div class="row text-center mb-4">
    <!-- Active Students -->
    <div class="col-md-6 col-sm-12 mb-3">
      <div class="stat-card bg-blue text-white shadow-sm d-flex justify-content-between align-items-center p-3 rounded">
        <div class="icon-container">
          <i class="fas fa-id-badge fa-3x text-light-blue"></i>
        </div>
        <div class="stat-content text-right">
          <h3 class="mb-0">{{ $activeStudentsCount }}</h3>
          <p class="mb-0">Active Students</p>
        </div>
      </div>
    </div>

    <!-- Active Lecturers -->
    <div class="col-md-6 col-sm-12 mb-3">
      <div class="stat-card bg-pink text-white shadow-sm d-flex justify-content-between align-items-center p-3 rounded">
        <div class="icon-container">
          <i class="fas fa-chalkboard-teacher fa-3x text-light-pink"></i>
        </div>
        <div class="stat-content text-right">
          <h3 class="mb-0">{{ $activeLecturersCount }}</h3>
          <p class="mb-0">IT Del Lecturers</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart -->
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header bg-light text-black">
          <h5 class="card-title text-center">Number of Graduates per Academic Year</h5>
        </div>
        <div class="card-body">
          <canvas id="studentsPassedChart" style="max-width: 100%; height: 300px;"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
<style>
  /* Welcome Banner Styling */
  .welcome-banner {
    background-color: #ffffff;
    border: 1px solid #ddd;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .welcome-title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #007bff;
    margin: 0;
  }

  /* Statistics Cards */
  .stat-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 10px;
    padding: 20px;
    min-height: 100px;
  }
  .bg-blue {
    background-color: #4285f4;
  }
  .text-light-blue {
    color: #a7c7ff;
  }
  .bg-pink {
    background-color: #f48fb1;
  }
  .text-light-pink {
    color: #ffc1e3;
  }

  .stat-content h3 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: bold;
  }
  .stat-content p {
    margin: 0;
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.9);
  }

  .icon-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
  }
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const passingStudentsPerYear = @json($passingStudentsPerYear);
  const yearData = Object.keys(passingStudentsPerYear);
  const passedData = Object.values(passingStudentsPerYear);

  const ctx = document.getElementById('studentsPassedChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: yearData,
      datasets: [{
        label: 'Students Who Passed',
        data: passedData,
        borderColor: '#007bff',
        fill: false,
        tension: 0.4,
        borderWidth: 3,
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: true, position: 'top' },
      },
      scales: {
        x: {
          title: {
            display: true,
            text: 'Year',
            font: { size: 14 },
          }
        },
        y: {
          title: {
            display: true,
            text: 'Number of Students',
            font: { size: 14 },
          },
          beginAtZero: true
        }
      }
    }
  });
</script>
@stop
