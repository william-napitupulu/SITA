@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1>Profile</h1>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile Details</h4>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Display the profile photo -->
                        <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('default-avatar.png') }}"
                             class="rounded-circle mb-3" alt="Profile Photo" width="120" height="120">
                    </div>
                    <div class="col-md-8">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Joined on:</strong> {{ $user->created_at->format('d M Y') }}</p>
                    </div>
                </div>
                <!-- Link to the settings page to edit profile -->
                <a href="{{ route('profile.settings') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
