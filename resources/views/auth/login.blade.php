<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            position: relative;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 360px;
            text-align: center;
            overflow: hidden;
        }

        .login-container::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 10px;
            background-color: #007bff;
        }

        .login-container::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 10px;
            background-color: #007bff;
        }

        .login-header {
            padding: 30px 0;
            background-color: white;
        }

        .login-header img {
            width: 80px;
            margin-bottom: 10px;
        }

        .login-header h1 {
            font-size: 24px;
            color: #007bff;
            margin: 0;
        }

        .login-form {
            padding: 30px;
            text-align: center;
        }

        .login-form h2 {
            font-size: 16px;
            color: #666;
            margin-top: -50px; /* Kurangi jarak ke atas untuk mendekatkan */
            margin-bottom: 40px; /* Atur jarak ke bawah */
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 10px 35px 10px 35px; /* Tambah padding agar ikon tidak menumpuk */
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f5faff;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-group .input-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #666;
        }

        .form-group .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px; /* Posisi di ujung kanan */
            transform: translateY(-50%);
            font-size: 16px;
            cursor: pointer;
            color: #666;
        }

        .error-message {
            color: red;
            font-size: 13px;
            margin-bottom: 5px;
            text-align: left;
        }

        .remember-checkbox {
            display: flex;
            align-items: center;
            justify-content: start;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .remember-checkbox input {
            margin-right: 10px;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .login-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .login-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <img src="vendor/adminlte/dist/img/logo.png" alt="Logo">
            <h1>SITA</h1>
        </div>
        <div class="login-form">
            <h2>Sign in to your account</h2>

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf

                <!-- Error Message for Username -->
                @error('username')
                <div class="error-message">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <span class="input-icon">👤</span>
                    <input type="text" name="username" id="username" placeholder="Username" required value="{{ old('username') }}">
                </div>

                <!-- Error Message for Password -->
                @error('password')
                <div class="error-message">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <span class="input-icon">🔑</span>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>

                <div class="remember-checkbox">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember username</label>
                </div>

                <button type="submit" class="login-button">Sign In</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            const isPasswordVisible = passwordInput.getAttribute('type') === 'text';

          
        }
    </script>
</body>
</html>
