@extends('adminlte::page')

@section('title', 'Academic Year')

@section('content_header')
<div class="bg-white p-3 border-bottom shadow-sm">
    <h1 class="text-primary fw-bold">Academic Year</h1>
</div>
@stop

@section('content')
<div class="container-fluid p-4">
    <!-- Full Screen Card Section -->
    <div class="card shadow-sm">
        <div class="card-header text-white bg-primary">
            <h3 class="mb-0" style="font-size: 1.3rem;">Select to View</h3>
        </div>
        <div class="card-body p-0">
            <!-- List Group for Academic Years -->
            <ul class="list-group list-group-flush">
                @foreach ($years as $index => $year)
                    <li class="list-group-item">
                        <a href="{{ route('academic.years.details', ['year' => $batches[$index]]) }}" 
                           class="text-primary fw-bold" style="font-size: 1.1rem;">
                            {{ $year }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    /* General Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa; /* Latar belakang abu terang */
        margin: 0;
        padding: 0;
    }

    /* Container styling */
    .container-fluid {
        margin: 0 auto;
        background-color: #fff; /* Latar belakang putih */
        border-radius: 10px; /* Sudut melengkung */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        max-width: 100%; /* Full screen */
        padding: 20px; /* Padding dalam */
    }

    /* Header Styling */
    .text-primary {
        color: #0d6efd !important;
        font-size: 1.8rem; /* Ukuran font lebih kecil */
        font-weight: bold;
    }

    .card-header {
        background-color: #0d6efd; /* Warna biru */
        color: white; /* Teks putih */
        font-size: 1.3rem; /* Ukuran font lebih kecil */
        padding: 15px; /* Ruang dalam */
        text-align: left; /* Teks rata kiri */
        border-radius: 10px 10px 0 0; /* Sudut atas melengkung */
    }

    /* List Group Styling */
    .list-group-item {
        font-size: 1.1rem; /* Ukuran font lebih kecil */
        padding: 12px 20px; /* Padding lebih proporsional */
    }

    .list-group-item a {
        text-decoration: none;
        color: #0d6efd;
        font-weight: bold;
        transition: color 0.3s ease; /* Efek transisi warna */
    }

    .list-group-item a:hover {
        color: #0056b3; /* Warna hover */
    }
</style>
@stop

@section('js')
<script>
    console.log("Academic Year Page Loaded!");
</script>
@stop
