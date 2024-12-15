@extends('adminlte::page')

@section('title', 'Profile')

@section('content')
<div class="container">
    <h1 class="mb-4">Your Profile</h1>

    <!-- Your Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}"
                             class="img-circle elevation-2 mb-3"
                             alt="User Image" width="100" height="100">
                    </div>
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
                    <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
                    <p><strong>Joined on:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Trigger the modal on page load -->
@if($showModal ?? false)
<script>
    $(document).ready(function() {
        $('#profileModal').modal('show');
    });
</script>
@endif
@endsection
