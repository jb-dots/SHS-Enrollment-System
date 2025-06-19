<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register - Senior Highschool Enrollment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4a90e2, #50e3c2);
            color: #fff;
            margin: 0;
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 2rem 3rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        h1 {
            color: #f39c12;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
            color: #fff;
            margin-bottom: 0.3rem;
        }
        .form-control {
            background-color: #2c3e50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
        }
        .form-control::placeholder {
            color: #a0aec0;
        }
        .btn-register {
            width: 100%;
            background-color: #f39c12;
            color: #2c3e50;
            padding: 0.9rem;
            font-size: 1.1rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-register:hover {
            background-color: #d87e04;
            color: #1a202c;
        }
        .login-link {
            margin-top: 1rem;
            text-align: center;
        }
        .login-link a {
            color: #f39c12;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: #ff6b6b;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            margin-bottom: 1rem;
        }
        .checkbox-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .form-check-input {
            width: 1.5em;
            height: 1.5em;
            margin-top: 0;
            background-color: #2c3e50;
            border-color: #fff;
        }
        .form-check-label {
            color: #fff;
            font-weight: normal;
            margin-left: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your full name" />
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="you@example.com" />
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Enter password" />
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" />
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">User Type</label>
                <div class="checkbox-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="student" name="user_type[]" value="student" {{ is_array(old('user_type')) && in_array('student', old('user_type')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="student">Student</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="instructor" name="user_type[]" value="instructor" {{ is_array(old('user_type')) && in_array('instructor', old('user_type')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="instructor">Instructor</label>
                    </div>
                </div>
                @error('user_type')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-register">Register</button>
        </form>
        <div class="login-link">
            <a href="{{ route('login') }}">Already registered? Login here</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>