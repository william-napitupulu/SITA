@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Profile Settings</h1>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Profile</h4>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Profile Photo Field -->
                    <div class="form-group">
                        <label for="profile_photo">Profile Photo</label>
                        <input type="file" class="form-control-file @error('profile_photo') is-invalid @enderror" id="profile_photo" name="profile_photo" accept="image/*">
                        @if ($user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" width="100" class="mt-2">
                        @endif
                        @error('profile_photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Current Password Field -->
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- New Password Fields -->
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
