@extends('adminlte::page')

@section('title', 'Approve Eligibility')

@section('content_header')
<div class="d-flex flex-column align-items-center p-3 bg-white w-100">
    <h1 class="text-primary">Approve Eligibility</h1>
    <small class="text-muted">Manage eligibility status of students</small>
</div>
@stop

@section('content')
<div class="container bg-white p-4 mt-4 rounded shadow-sm">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Eligibility Table -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Eligibility Status</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eligibilities as $eligibility)
                        <tr>
                            <td>{{ $eligibility->user->name }}</td>
                            <td>{{ $eligibility->user->email }}</td>
                            <td>{{ $eligibility->is_eligible ? 'Approved' : 'Not Approved' }}</td>
                            <td>
                                @if(!$eligibility->is_eligible)
                                    <form action="{{ url('eligibility/approve/' . $eligibility->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                @else
                                    <form action="{{ url('eligibility/disapprove/' . $eligibility->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Disapprove</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script>
    // Optional: Add JS functionality if needed for dynamic actions
</script>
@stop
