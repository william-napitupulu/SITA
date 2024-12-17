@extends('adminlte::page')

@section('title', 'Eligibility Form')

@section('content_header')
<!-- Full-width Header -->
<div class="full-width-header bg-light shadow-sm p-3 mb-3">
    <div class="container-fluid d-flex justify-content-between align-items-center px-3">
        <h1 class="header-title thesis-header mb-0">Eligibility Form</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Eligibility Form</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Section Header -->
<div class="header-box bg-white p-3 shadow-sm rounded d-flex align-items-center mb-4">
    <i class="fas fa-clipboard-check icon-style"></i>
    <h1 class="header-title preview-header mb-0">Checklist Eligibility Form</h1>
</div>
@stop

@section('content')
<!-- Background Container -->
<div class="background-container"></div>

<!-- Main Content Wrapper -->
<div class="container-main bg-white p-4 mt-4 rounded shadow">
    <!-- Checklist Form -->
    <form method="POST" action="{{ route('request.store') }}">
        @csrf
        @php
            $status = Auth::user()->status ?? 'Not Approved';
            $disabled = $status !== 'Not Approved' ? 'disabled' : '';
        @endphp

        <!-- Checklist Items -->
        <div class="checklist-items-container p-3 rounded mb-4">
            @foreach([
                'criteria_1' => 'Terdaftar di Pangkalan Data DIKTI (PD-DIKTI)',
                'criteria_2' => 'Telah lulus evaluasi Tahun Pertama sesuai Kurikulum 2019',
                'criteria_3' => 'Mengambil minimal 90% dari total SKS Tahap Sarjana (semester 3-6) dan lulus minimal 90% dengan nilai C atau lebih tinggi, tanpa nilai E.',
                'criteria_4' => 'Memiliki IPK minimal 2.00 atau sesuai ketentuan program studi.',
                'criteria_5' => 'Nilai Perilaku minimal C atau lebih tinggi sesuai ketentuan program studi.',
                'criteria_6' => 'TOEFL ITP/PBT minimum 460 atau sertifikat setara yang masih berlaku'
            ] as $key => $label)
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" name="criteria[]" value="{{ $key }}"
                    {{ in_array($key, $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                <label class="form-check-label">{{ $label }}</label>
            </div>
            @endforeach
        </div>

        <!-- Status Container -->
        <div class="status-container text-center mt-4">
            @if($status === 'Pending')
                <div class="status-message text-warning">
                    <i class="fas fa-clock fa-2x mb-2"></i>
                    <p>Waiting for TA<br>Coordinator Approval</p>
                </div>
            @elseif($status === 'Approved')
                <div class="status-message text-success">
                    <i class="fas fa-check-circle fa-2x mb-2"></i>
                    <p>Accepted by the TA<br>Coordinator</p>
                </div>
            @elseif($status === 'Rejected')
                <div class="status-message text-danger">
                    <i class="fas fa-times-circle fa-2x mb-2"></i>
                    <p>Rejected by the<br>Coordinator</p>
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
/* General Styles */
body {
    font-family: 'Inter', sans-serif;
}

/* Full-width Header */
.full-width-header {
    background-color: #ffffff;
    border-bottom: 1px solid #dee2e6;
    margin-bottom: 30px;
    position: relative;
}

/* Header Box */
.header-box {
    display: flex;
    align-items: center;
    background-color: #ffffff;
    border-bottom: 2px solid #e0e0e0;
    padding: 14px 30px;
}

.header-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #0079C2;
}

.icon-style {
    font-size: 1.8rem;
    color: #5C5252;
    margin-right: 10px;
}

/* Container Main */
.container-main {
    background-color: #ffffff;
    border: 1px solid #D7E8FF;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    padding: 20px;
}

/* Checklist Items */
.checklist-items-container {
    background-color: #f9f9f9;
    border: 1px solid #e0e0e0;
    padding: 15px;
    border-radius: 10px;
}

.form-check-input {
    transform: scale(1.2);
    margin-right: 8px;
    accent-color: #0079C2;
}

.form-check-label {
    font-weight: 500;
    color: #495057;
}

/* Status Messages */
.status-container {
    font-weight: 600;
    font-size: 1.1rem;
}

.status-message i {
    margin-bottom: 5px;
}
</style>
@stop

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Eligibility Form loaded.');
});
</script>
@stop
