@extends('adminlte::page')

@section('content_header')
<div class="d-flex justify-content-between align-items-center bg-white w-100">
    <h1 class="text-primary mb-0">Thesis Seminar 1</h1>
    <small class="text-muted mb-0" style="font-size: 1rem;">Home > My Progress > Thesis Seminar 1</small>
</div>
@stop

@section('content')

<div class="d-flex justify-content-start align-items-center p-3 bg-white w-100">
    <div class="row justify-content-start mb-4 w-100">
        <div class="col-md-12 text-left">
            <div class="alert text-left">
                <h2 class="d-inline-block align-middle ml-3">
                    <i class="fa fa-download"></i> Download Kit Template Thesis Seminar 1
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="container bg-white p-4 mt-4 rounded shadow-sm">
    <div class="d-flex align-items-center mb-4">
        <!-- Image as Icon -->
        <img src="{{ asset('storage/file.png') }}" alt="Download Icon" class="icon mr-2">
        
        <!-- Text -->
        <span class="mr-3">Choose Template</span>
        
        <!-- Dropdown (select box) -->
        <select id="templateDropdown" class="form-control w-auto">
            <option value="select">Select</option>
            <option value="Seminar Proposal">Seminar Proposal</option>
            <option value="Seminar TA-1">Seminar TA-1</option>
        </select>
    </div>

    <div class="d-flex justify-content-center">
        <!-- The download button is initially disabled -->
        <button id="downloadBtn" class="btn btn-primary" disabled>
            <i class="fa fa-download"></i> Download
        </button>
    </div>
</div>

<!-- Success Notification Box (This is the pop-up) -->
<div id="downloadSuccessBox" class="alert alert-success alert-dismissible fade show" style="display:none; position: fixed; top: 20px; right: 20px; z-index: 9999;">
    <strong>Success!</strong> Your download has started.
</div>

@stop

@section('css')
<style>
    /* Styling for image icon */
    .icon {
        width: 200px; /* Adjust the width here */
        height: 160px; /* Adjust the height here */
        object-fit: contain;
    }

    /* Button Styling */
    .btn-primary {
        font-size: 16px;
        padding: 10px 20px;
    }

    /* Ensure button stays centered */
    .d-flex.justify-content-center {
        justify-content: center !important;
    }
</style>
@stop

@section('js')
<script>
    // Get the DOM elements
    const downloadBtn = document.getElementById('downloadBtn');
    const dropdown = document.getElementById('templateDropdown');
    const successBox = document.getElementById('downloadSuccessBox');

    // Add event listener for the dropdown selection change
    dropdown.addEventListener('change', function () {
        // Enable or disable the button based on dropdown selection
        if (dropdown.value === 'select') {
            downloadBtn.disabled = true; // Disable the button if "Select" is chosen
        } else {
            downloadBtn.disabled = false; // Enable the button if a template is chosen
        }
    });

    // Add event listener for the download button click
    downloadBtn.addEventListener('click', function () {
        const selectedOption = dropdown.value;
        console.log("Selected option: " + selectedOption);

        // Show the success notification box
        successBox.style.display = 'block';

        // Hide the notification box after 3 seconds
        setTimeout(function() {
            successBox.style.display = 'none';
        }, 3000);

        // Based on the selected option, trigger the file download
        if (selectedOption === 'Seminar Proposal') {
            // Force download for Seminar Proposal (PDF)
            window.location.href = "/download-pdf"; // Custom route for PDF download
        } else if (selectedOption === 'Seminar TA-1') {
            // Trigger the download for Seminar TA-1 (ZIP)
            window.location.href = "{{ asset('storage/files/Seminar TA 1.zip') }}";
        }
    });
</script>
@stop
