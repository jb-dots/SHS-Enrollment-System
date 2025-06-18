<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Senior Highschool Enrollment System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4a90e2, #50e3c2);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-x: hidden;
        }
        aside.sidebar {
            width: 260px;
            background: rgba(0, 0, 0, 0.85);
            padding: 6rem 2rem 2rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            height: 100vh;
            box-shadow: 3px 0 20px rgba(0,0,0,0.5);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: transform 0.4s ease-in-out;
        }
        aside.sidebar.closed {
            transform: translateX(-100%);
        }
        aside.sidebar a, aside.sidebar form button {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 2.5rem;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0.25rem 0;
            width: 100%;
            text-align: left;
            transition: color 0.3s ease-in-out;
        }
        aside.sidebar a:hover, aside.sidebar form button:hover {
            color: #f39c12;
            text-decoration: none;
        }
        .container {
            max-width: 900px;
            background: rgba(0, 0, 0, 0.6);
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            text-align: center;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: margin-left 0.4s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 1;
        }
        .container.full-width {
            margin-left: 0;
        }
        .container.transitioning {
            opacity: 0;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
        }
        p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }
        .btn {
            display: inline-block;
            background-color: #f39c12;
            color: #fff;
            padding: 1rem 2rem;
            margin: 0 0.5rem;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.6);
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
            white-space: nowrap;
        }
        .btn:hover {
            background-color: #d87e04;
            transform: translateY(-2px);
        }
        .btn-admin {
            background-color: #e74c3c;
        }
        .btn-admin:hover {
            background-color: #c0392b;
        }
        .toggle-btn {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1100;
            background: #f39c12;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(243, 156, 18, 0.5);
            transition: transform 0.2s ease-in-out, background-color 0.3s ease-in-out;
        }
        .toggle-btn:hover {
            background-color: #d87e04;
            transform: translateY(-2px);
        }
        .toggle-btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.7);
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }
    </style>
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const container = document.querySelector('.container');
            container.classList.add('transitioning');
            setTimeout(() => {
                sidebar.classList.toggle('closed');
                container.classList.toggle('full-width');
                setTimeout(() => {
                    container.classList.remove('transitioning');
                }, 400); // Match the transition duration
            }, 50); // Small delay to ensure the transition class applies
        }
    </script>
</head>
<body>
    <button class="toggle-btn" aria-label="Toggle sidebar" onclick="toggleSidebar()">
        ☰ Menu
    </button>
    <aside class="sidebar" role="navigation" aria-label="Sidebar navigation">
        @auth
            <a href="{{ route('profile.edit') }}" tabindex="0">Profile</a>
            <a href="{{ route('tracks.index') }}" tabindex="0">View Tracks</a>
            <a href="{{ route('strands.index') }}" tabindex="0">View Strands</a>
            <a href="{{ route('enrollments.index') }}" tabindex="0">View Enrollments</a>
            <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to logout?');">
                @csrf
                <button type="submit" tabindex="0">Logout</button>
            </form>
        @endauth
    </aside>
    <div class="container" role="main">
        <h1>Welcome to the Senior Highschool Enrollment System</h1>
        <p>Enroll and register for your desired courses easily and securely.</p>
        <div class="btn-group">
            <a href="{{ route('tracks.index') }}" class="btn">View Tracks</a>
            <a href="{{ route('strands.index') }}" class="btn">View Strands</a>
            <a href="{{ route('enrollments.index') }}" class="btn">View Enrollments</a>
        </div>
    </div>
</body>
</html>