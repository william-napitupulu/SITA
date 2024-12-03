<!-- resources/views/thesis/index.blade.php -->
@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Thesis Details</h2>

    <div class="card">
        <div class="card-header">
            <h3>{{ $thesis['title'] }}</h3>
            <small>Semester: {{ $thesis['semester'] }}</small>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <strong>Title:</strong> {{ $thesis['title'] }}<br>
                    <strong>Semester:</strong> {{ $thesis['semester'] }}<br>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ $thesis['download_link'] }}" class="btn btn-success">
                        <i class="fa fa-download"></i> Download Thesis
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
