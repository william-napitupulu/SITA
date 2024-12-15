@extends('adminlte::page')

@section('title', 'Thesis Handbook')

@section('content_header')
<div class="header-box bg-white p-3 shadow-sm rounded d-flex align-items-center">
  <i class="fas fa-book icon-style"></i>
  <h1 class="header-title mb-0">Preview and Download Handbook</h1>
</div>
@stop

@section('content')
<!-- Box Utama untuk Background -->
<div class="background-container"></div>

<!-- Wrapper Box yang mencakup Buku Pedoman TA dan Seminar Proposal -->
<div class="container-main bg-white p-4 mt-4 rounded shadow">
  <!-- Handbook Section -->
  <div class="row d-flex flex-column" style="height: 100%;">
    <div class="col-12 mb-3">
      <div class="card border-light shadow-sm rounded hover-card equal-box">
        <div class="card-body d-flex justify-content-between align-items-center px-4 py-3">
          <div>
            <h5 class="mb-0 card-title">Buku Pedoman TA</h5>
          </div>
          <div class="button-container">
            <a href="{{ asset('storage/files/Buku Pedoman TA S1IF-draft-v3.pdf') }}" class="btn btn-preview"
              target="_blank">
              <i class="fas fa-eye"></i> Preview
            </a>
            <a href="{{ asset('storage/files/Buku Pedoman TA S1IF-draft-v3.pdf') }}" class="btn btn-download"
              target="_blank">
              <i class="fas fa-download"></i> Download
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card border-light shadow-sm rounded hover-card equal-box">
        <div class="card-body d-flex justify-content-between align-items-center px-4 py-3">
          <div>
            <h5 class="mb-0 card-title">Buku Pedoman Seminar Proposal</h5>
          </div>
          <div class="button-container">
            <a href="{{ asset('storage/files/Buku Pedoman Seminar Proposal.pdf') }}" class="btn btn-preview"
              target="_blank">
              <i class="fas fa-eye"></i> Preview
            </a>
            <a href="{{ asset('storage/files/Buku Pedoman Seminar Proposal.pdf') }}" class="btn btn-download"
              target="_blank">
              <i class="fas fa-download"></i> Download
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
<style>
/* Background Styling */
.background-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #ffffff;
  z-index: 0;
  border: 1px solid rgba(217, 217, 217, 0.5);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}

/* Kontainer Utama */
.container-main {
  position: relative;
  z-index: 1;
  background-color: #ffffff;
  border: 1.4px solid #D7E8FF;
  border-radius: 10px;
  padding: 45px 30px !important;
  box-sizing: border-box;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  margin-top: 6px !important;
  min-height: calc(100vh - 180px) !important;
}

/* Header Box */
.header-box {
  position: relative;
  z-index: 2;
  background-color: #ffffff;
  border-bottom: 4px solid rgba(217, 217, 217, 0.5);
  padding: 14px 30px;
  display: flex;
  align-items: center;
}

.header-title {
  font-family: 'Inter', sans-serif;
  font-size: 1.5rem !important;
  font-weight: 500 !important;
  color: #5C5252;
  margin-left: 14px !important;
  margin-bottom: 0 !important;
}

.icon-style {
  font-size: 1.5rem;
  color: #5C5252;
}

/* Individual Box Styling */
.card {
  background-color: #ffffff;
  border: 1px solid #D7E8FF !important;
  border-radius: 10px;
  box-sizing: border-box;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15) !important;
}

/* Typography for Card Title */
.card-title {
  font-family: 'Inter', sans-serif;
  font-size: 1.2rem;
  font-weight: 600;
  color: #0079C2;
}

/* Button Styles */
.btn-preview {
  background-color: #D7E8FF;
  color: #54575A;
  font-family: 'Inter', sans-serif;
  font-weight: bold;
  border-radius: 5px !important;
  padding: 8px 16px !important;
  border: none !important;
}

.btn-preview:hover {
  background-color: #c3d9f9 !important;
}

.btn-download {
  background-color: rgba(99, 168, 249, 0.8);
  color: #ffffff;
  font-family: 'Inter', sans-serif;
  font-weight: bold;
  border-radius: 5px !important;
  padding: 8px 16px !important;
  border: none !important;
}

.btn-download:hover {
  background-color: rgba(99, 168, 249, 1) !important;
}

/* Button Container Adjustments */
.button-container {
  display: flex !important;
  gap: 10px !important;
  /* Small space between Preview and Download */
  margin-top: 10px !important;
  /* Added margin top for separation */
  margin-left: 20px !important;
  /* Space between the title and the buttons */
}

/* Remove extra margin on the buttons */
.button-container .btn {
  margin: 0 !important;
}

/* Align the buttons vertically */
.card-body .button-container {
  display: flex;
  flex-direction: row !important;
  justify-content: flex-start !important;
  align-items: center !important;
}

/* Responsive Design */
@media (max-width: 768px) {
  .container-main {
    padding: 12px 16px;
  }

  .btn-md {
    font-size: 0.8rem;
  }
}
</style>
@stop

@section('js')
<script>
console.log('Thesis Handbook page loaded.');
</script>
@stop