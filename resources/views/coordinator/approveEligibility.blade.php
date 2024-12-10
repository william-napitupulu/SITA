@extends('adminlte::page')

@section('title', 'Approve Eligibility')

@section('content_header')
<div class="d-flex flex-column align-items-center p-3 bg-white w-100">
    <h1 class="text-primary">Approve Eligibility</h1>
    <small class="text-muted">Manage eligibility status of students</small>
</div>
@stop

@section('content')
<div class="container">
    <h2>Requests</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->user->name }}</td>
                <td>{{ ucfirst($request->status) }}</td>
                <td>
                    @if($request->status === 'pending')
                    <form action="{{ route('request.approve', $request->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('request.reject', $request->id) }}" method="POST">
                        @csrf
                        <textarea name="comments" placeholder="Add comments"></textarea>
                        <button class="btn btn-danger">Reject</button>
                    </form>
                    @else
                    {{ ucfirst($request->status) }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
