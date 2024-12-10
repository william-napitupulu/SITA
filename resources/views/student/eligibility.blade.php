@extends('adminlte::page')

@php
    dd($eligibility);
@endphp

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
        @if(isset($eligibility))
            <!-- If Pending -->
            @if($eligibility->eligibility_status == 'waiting')
                <h4>Status</h4>
                <p class="text-warning"><i class="fas fa-clock"></i> Waiting for TA Coordinator Approval</p>
                <p class="text-muted"><i class="fas fa-info-circle"></i> You cannot submit another request while your current request is being reviewed.</p>
            
            <!-- If Approved -->
            @elseif($eligibility->eligibility_status == 'approved')
                <h4>Status</h4>
                <p class="text-success"><i class="fas fa-check-circle"></i> Approved by TA Coordinator</p>
                <p class="text-muted"><i class="fas fa-info-circle"></i> Your eligibility request has been approved. No further actions are needed.</p>
            
            <!-- If Rejected -->
            @elseif($eligibility->eligibility_status == 'rejected')
                @if(session()->has('rejected_shown'))
                    <!-- Allow sending a new form after showing rejection once -->
                    <form method="POST" action="{{ route('request.store') }}" class="mt-4">
                        @csrf

                        <div class="form-group">
                            <label><strong>Eligibility Criteria</strong></label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_1" id="criteria_1">
                                <label class="form-check-label" for="criteria_1">Terdaftar di Pangkalan Data DIKTI (PD-DIKTI)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_2" id="criteria_2">
                                <label class="form-check-label" for="criteria_2">Telah lulus evaluasi Tahun Pertama sesuai Kurikulum 2019</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_3" id="criteria_3">
                                <label class="form-check-label" for="criteria_3">Mengambil minimal 90% dari total SKS Tahap Sarjana (semester 3-6) dan lulus minimal 90% dengan nilai C atau lebih tinggi, tanpa nilai E.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_4" id="criteria_4">
                                <label class="form-check-label" for="criteria_4">Memiliki IPK minimal 2.00 atau sesuai ketentuan program studi.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_5" id="criteria_5">
                                <label class="form-check-label" for="criteria_5">Nilai Perilaku minimal C atau lebih tinggi sesuai ketentuan program studi.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_6" id="criteria_6">
                                <label class="form-check-label" for="criteria_6">TOEFL ITP/PBT minimum 460 atau sertifikat setara yang masih berlaku</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @else
                    <h4>Status</h4>
                    <p class="text-danger"><i class="fas fa-times-circle"></i> Rejected by TA Coordinator</p>
                    <p class="text-muted"><i class="fas fa-info-circle"></i> Please refresh the page to submit a new request.</p>
                    {{ session()->put('rejected_shown', true) }}
                @endif
            @endif
        @else
        
            <!-- No existing eligibility request -->
            <form method="POST" action="{{ route('request.store') }}" class="mt-4">
                @csrf

                <div class="form-group">
                    <label><strong>Eligibility Criteria</strong></label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_1" id="criteria_1">
                        <label class="form-check-label" for="criteria_1"> Terdaftar di Pangkalan Data DIKTI (PD-DIKTI)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_2" id="criteria_2">
                        <label class="form-check-label" for="criteria_2">Telah lulus evaluasi Tahun Pertama sesuai Kurikulum 2019</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_3" id="criteria_3">
                        <label class="form-check-label" for="criteria_3">Mengambil minimal 90% dari total SKS Tahap Sarjana (semester 3-6) dan lulus minimal 90% dengan nilai C atau lebih tinggi, tanpa nilai E.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_4" id="criteria_4">
                        <label class="form-check-label" for="criteria_4">Memiliki IPK minimal 2.00 atau sesuai ketentuan program studi.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_5" id="criteria_5">
                        <label class="form-check-label" for="criteria_5">Nilai Perilaku minimal C atau lebih tinggi sesuai ketentuan program studi.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="criteria[]" value="criteria_6" id="criteria_6">
                        <label class="form-check-label" for="criteria_6">TOEFL ITP/PBT minimum 460 atau sertifikat setara yang masih berlaku</label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endif
    </div>
</div>
@stop
