@extends('adminlte::page')

@section('title', 'Thesis Handbook')

@section('content_header')
<div class="d-flex justify-content-between align-items-center p-3 bg-white w-100">
  <div class="page-title">
    <h1 class="mr-2 text-primary">Thesis Handbook</h1>
  </div>
  <small class="text-muted">Guidelines for thesis submission</small>
</div>
@stop

@section('content')
<div class="container bg-white p-4 mt-4 rounded shadow-sm">
  <!-- Thesis Handbook Section -->
  <div class="row justify-content-center">
    <div class="col-md-8 col-sm-10">
      <div class="card">
        <div class="card-header text-black text-center">
          <h3 class="card-title">Thesis Handbook</h3>
        </div>
        <div class="card-body text-center">
          <p class="mb-3">Download or preview the Thesis Handbook for guidelines on how to submit your thesis. Ensure
            you follow the instructions for a successful submission.</p>
          <div class="d-flex justify-content-center">
            <!-- Download Button -->
            <a href="{{ asset('storage/files/Buku Pedoman TA S1IF-draft-v3.pdf') }}" class="btn btn-primary mx-2"
              target="_blank">
              Download Thesis Handbook
            </a>
            <!-- Preview Button -->
            <a href="{{ asset('storage/files/Buku Pedoman TA S1IF-draft-v3.pdf') }}" class="btn btn-secondary mx-2"
              target="_blank">
              Preview Thesis Handbook
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Version Information Section -->
  <div class="row justify-content-center mt-4">
    <div class="col-md-8 col-sm-10">
      <div class="card text-center">
        <div class="card-header text-black">
          <h3 class="card-title">Version Information</h3>
        </div>
        <div class="card-body">
          <p class="mb-3">Last updated on: <strong>January 2024</strong></p>
          <p class="mb-3">Version: <strong>1.2</strong></p>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop