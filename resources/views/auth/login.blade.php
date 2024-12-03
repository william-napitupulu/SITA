<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Styles as before... */
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Login</h2>

            <!-- Check if token exists in session -->
            @if(session('api_token'))
                <div class="token-info">
                    <strong>API Token:</strong> {{ session('api_token') }}
                </div>
            @else
                <div class="token-missing">
                    <strong>Warning:</strong> No API token found. Please log in to retrieve the token.
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <!-- Username Input -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required value="{{ old('username') }}">
                    @error('username')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    @error('password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="login-button">Login</button>
            </form>

            <div class="login-footer">
                <p>Don't have an account? <a href="#">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>
</html>
