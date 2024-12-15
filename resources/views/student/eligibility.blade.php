@extends('adminlte::page')

@section('content')

@section('content_header')
<!-- Full-width Header -->
<div class="full-width-header bg-light shadow-sm p-3 mb-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h1 class="header-title thesis-header mb-0">Eligibility Form</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Eligibility Form</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Header Box -->
<div class="header-box bg-white p-3 shadow-sm rounded d-flex align-items-center mb-4">
    <i class="fas fa-clipboard-check icon-style"></i>
    <h1 class="header-title preview-header mb-0">Checklist Eligibility Form</h1>
</div>
@stop

<!-- Main Content -->
<div class="container-main p-4">
    <!-- Checklist Form -->
    <form method="POST" action="{{ route('request.store') }}">
        @csrf
        @php
            $status = Auth::user()->status ?? 'Not Approved';
            $disabled = $status !== 'Not Approved' ? 'disabled' : '';
        @endphp

        <!-- Checklist Items Container -->
        <div class="checklist-items-container mb-3">
            <!-- Checklist Items -->
            <div class="form-group mb-2">
                <label>
                    <input type="checkbox" name="criteria[]" value="criteria_1"
                        {{ in_array('criteria_1', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                    Terdaftar di Pangkalan Data DIKTI (PD-DIKTI)
                </label>
            </div>
            <div class="form-group mb-2">
                <label>
                    <input type="checkbox" name="criteria[]" value="criteria_2"
                        {{ in_array('criteria_2', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                    Telah lulus evaluasi Tahun Pertama sesuai Kurikulum 2019
                </label>
            </div>
            <div class="form-group mb-2">
                <label>
                    <input type="checkbox" name="criteria[]" value="criteria_3"
                        {{ in_array('criteria_3', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                    Mengambil minimal 90% dari total SKS Tahap Sarjana (semester 3–6) dan lulus minimal 90% dengan nilai C atau lebih tinggi, tanpa nilai E.
                </label>
            </div>
            <div class="form-group mb-2">
                <label>
                    <input type="checkbox" name="criteria[]" value="criteria_4"
                        {{ in_array('criteria_4', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                    Memiliki IPK minimal 2.00 atau sesuai ketentuan program studi.
                </label>
            </div>
            <div class="form-group mb-2">
                <label>
                    <input type="checkbox" name="criteria[]" value="criteria_5"
                        {{ in_array('criteria_5', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                    Nilai Perilaku minimal C atau lebih tinggi sesuai ketentuan program studi.
                </label>
            </div>
            <div class="form-group mb-0">
                <label>
                    <input type="checkbox" name="criteria[]" value="criteria_6"
                        {{ in_array('criteria_6', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                    TOEFL ITP/PBT minimum 460 atau sertifikat setara yang masih berlaku
                </label>
            </div>
        </div>

        <!-- Status Container -->
        <div class="status-container text-center mt-4">
            @if($status === 'Pending')
                <div class="status-message status-pending">
                    <i class="fas fa-clock" style="color: #ffc107;"></i>
                    <span class="text-warning font-weight-bold">Waiting for TA<br>Coordinator Approval</span>
                </div>
            @elseif($status === 'Approved')
                <div class="status-message status-approved">
                    <i class="fas fa-check-circle" style="color: #28a745;"></i>
                    <span class="text-success font-weight-bold">Accepted by the TA<br>Coordinator</span>
                </div>
            @elseif($status === 'Rejected')
                <div class="status-message status-rejected">
                    <i class="fas fa-times-circle" style="color: #dc3545;"></i>
                    <span class="text-danger font-weight-bold">Rejected by the<br>Coordinator</span>
                </div>
                <a href="{{ route('update.status') }}" class="btn btn-warning mt-3">Reset</a>
            @else
                <button type="submit" class="btn btn-primary">Send</button>
            @endif
        </div>
    </form>
</div>

@stop

@section('css')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

  body {
    font-family: 'Inter', sans-serif;
  }

  .full-width-header {
    border-bottom: 1px solid #ddd;
    background-color: #f9f9f9;
  }

  .header-title {
    font-weight: 600;
    color: #007bff;
  }

  .header-box {
    display: flex;
    align-items: center;
    border-bottom: 2px solid #ddd;
  }

  .icon-style {
    font-size: 1.5rem;
    color: #6c757d;
    margin-right: 10px;
  }

  .preview-header {
    font-size: 1.2rem;
    color: #495057;
    font-weight: 600;
  }

  .container-main {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  }

  .checklist-items-container {
    background-color: #f9f9f9;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 15px;
  }

  .checklist-items-container input[type="checkbox"] {
    margin-right: 8px;
    transform: scale(1.2);
    accent-color: #007bff; /* Warna centang biru */
    cursor: pointer;
  }

  .status-message {
    font-size: 1rem;
    font-weight: 600;
  }

  .status-pending {
    color: #ffc107;
  }

  .status-approved {
    color: #28a745;
  }

  .status-rejected {
    color: #dc3545;
  }
</style>
@stop
