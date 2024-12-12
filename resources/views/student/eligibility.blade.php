@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Eligibility Form</h2>

    <!-- Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <!-- Approval Status -->
    <div class="mt-4">
        <form method="POST" action="{{ route('request.store') }}">
            @csrf

            @php
                $status = Auth::user()->status;
                // Determine if the checkboxes should be disabled
                $disabled = $status !== 'Not Approved' ? 'disabled' : '';
            @endphp

            <div class="form-group">
                <label><strong>Eligibility Criteria</strong></label><br>
                
                <input type="checkbox" name="criteria[]" value="criteria_1" 
                    {{ in_array('criteria_1', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                <label for="criteria_1"> Terdaftar di Pangkalan Data DIKTI (PD-DIKTI)</label><br>
                
                <input type="checkbox" name="criteria[]" value="criteria_2" 
                    {{ in_array('criteria_2', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                <label for="criteria_2">Telah lulus evaluasi Tahun Pertama sesuai Kurikulum 2019</label><br>
                
                <input type="checkbox" name="criteria[]" value="criteria_3" 
                    {{ in_array('criteria_3', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                <label for="criteria_3">Mengambil minimal 90% dari total SKS Tahap Sarjana (semester 3-6) dan lulus minimal 90% dengan nilai C atau lebih tinggi, tanpa nilai E.</label><br>
                
                <input type="checkbox" name="criteria[]" value="criteria_4" 
                    {{ in_array('criteria_4', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                <label for="criteria_4">Memiliki IPK minimal 2.00 atau sesuai ketentuan program studi.</label><br>
                
                <input type="checkbox" name="criteria[]" value="criteria_5" 
                    {{ in_array('criteria_5', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                <label for="criteria_5">Nilai Perilaku minimal C atau lebih tinggi sesuai ketentuan program studi.</label><br>
                
                <input type="checkbox" name="criteria[]" value="criteria_6" 
                    {{ in_array('criteria_6', $requestCriteria ?? []) ? 'checked' : '' }} {{ $disabled }}>
                <label for="criteria_6">TOEFL ITP/PBT minimum 460 atau sertifikat setara yang masih berlaku</label><br>
                
            </div>

            {{-- Form Actions --}}
            @if($status === 'Not Approved')
                <button type="submit" class="btn btn-primary">Submit</button>
            @elseif($status === 'Pending')
                <p>Your request is pending approval.</p>
            @elseif($status === 'Approved')
                <p>Your request has been approved.</p>
            @elseif($status === 'Rejected')
                <p>Your request has been rejected. Status is now 'Not Approved'.</p>
                <a href="{{ route('update.status') }}" class="btn btn-warning">Reset</a>
            @endif
        </form>
    </div>
</div>
@stop
