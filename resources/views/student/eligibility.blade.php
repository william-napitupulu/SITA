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

            @php
                $status = Auth::user()->status;
                
            @endphp

            @if($status === 'Not Approved')
                <button type="submit" class="btn btn-primary">Submit</button>
            @elseif($status === 'Pending')
                <p>Your request is pending approval.</p>
            @elseif($status === 'Approved')
                <p>Your request has been approved.</p>
            @elseif($status === 'Rejected')
            
                @php
                    // You would normally trigger an action from here, but do this in the controller instead.
                    // This is just for logic illustration:
                    // Auth::user()->update(['status' => 'Not Approved']);
                @endphp
                <p>Your request has been rejected. Status is now 'Not Approved'.</p>
                <a href="{{ route('update.status') }}" >Reset</a>

              
            
            @endif
        </form>
    </div>
</div>
@stop
