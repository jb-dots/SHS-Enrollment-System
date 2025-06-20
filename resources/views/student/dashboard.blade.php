<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Dashboard - Senior Highschool Enrollment System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            overflow-x: hidden;
        }
        aside.sidebar {
            width: 260px;
            background: #2c3e50;
            padding: 6rem 2rem 2rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            height: 100vh;
            box-shadow: 3px 0 20px rgba(0,0,0,0.3);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: transform 0.4s ease-in-out;
        }
        aside.sidebar a, aside.sidebar form button {
            color: #ecf0f1;
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
            background: #ffffff;
            padding: 4rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            margin-left: 320px; 
            width: 100%;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
            text-align: center;
        }
        h2 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid #f39c12;
            padding-bottom: 0.5rem;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        ul li {
            background: rgba(243, 156, 18, 0.2);
            margin-bottom: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            color: #333;
        }
        .logout-button {
            background: none;
            border: none;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0.25rem 0;
            width: 100%;
            text-align: left;
            margin-top: auto;
            transition: color 0.3s ease-in-out;
        }
        .logout-button:hover {
            color: #f39c12;
        }
    </style>
</head>
<body>
    <aside class="sidebar" role="navigation" aria-label="Sidebar navigation">
        @auth
            <a href="{{ route('profile.edit') }}">Profile</a>
            <a href="{{ route('student.dashboard') }}">Student Dashboard</a>
            <a href="{{ route('tracks.index') }}">View Tracks</a>
            <a href="{{ route('strands.index') }}">View Strands</a>
            <a href="{{ route('enrollments.index') }}">View Enrollments</a>
            <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to logout?');">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        @endauth
    </aside>
    <div class="container" role="main">
        <h1>Student Dashboard</h1>

        <h2>Tracks and Strands</h2>
        @foreach($tracks as $track)
            <h3>{{ $track->name }}</h3>
            <ul>
                @php
                    $strands = is_string($track->strands) ? json_decode($track->strands, true) : $track->strands;
                @endphp
                @if(is_array($strands) || $strands instanceof \Illuminate\Support\Collection)
                    @foreach($strands as $strand)
                        <li>{{ is_array($strand) ? $strand['name'] : $strand->name }}</li>
                    @endforeach
                @else
                    <li>No strands available</li>
                @endif
            </ul>
        @endforeach

        <h2>Your Enrollments and Requirements</h2>
        @if($enrollments->isEmpty())
            <p>You have no enrollments or requirements at this time.</p>
        @else
            <ul>
                @foreach($enrollments as $enrollment)
                    <li>
                        Subject: {{ $enrollment->subject_name ?? 'N/A' }}<br />
                        Strand: {{ $enrollment->strand_name ?? 'N/A' }}<br />
                        Status: {{ ucfirst($enrollment->status) }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>