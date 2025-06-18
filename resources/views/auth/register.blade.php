<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register - Senior Highschool Enrollment System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4a90e2, #50e3c2);
            color: #fff;
            margin: 0;
            padding: 2rem;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 2rem 3rem;
            width: 360px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        h1 {
            color: #f39c12;
            font-weight: bold;
            margin-bottom: 1rem;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 0.3rem;
            font-weight: bold;
            color: #fff;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem 1rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #2c3e50;
            color: #fff;
            font-size: 1rem;
            box-sizing: border-box;
        }
        input::placeholder {
            color: #a0aec0;
        }
        button {
            width: 100%;
            background-color: #f39c12;
            color: #2c3e50;
            padding: 0.9rem;
            font-size: 1.1rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
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
            margin-top: -0.75rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your full name" />
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="you@example.com" />
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Enter password" />
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" />
            @error('password_confirmation')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit">Register</button>
        </form>
        <div class="login-link">
            <a href="{{ route('login') }}">Already registered? Login here</a>
        </div>
    </div>
</body>
</html>
