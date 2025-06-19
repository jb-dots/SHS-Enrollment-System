<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users - Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }
        aside {
            width: 250px;
            background-color: #1f2937;
            color: white;
            padding: 20px;
            box-sizing: border-box;
        }
        aside h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
            border-bottom: 1px solid #374151;
            padding-bottom: 10px;
        }
        aside ul {
            list-style: none;
            padding: 0;
        }
        aside ul li {
            margin-bottom: 15px;
        }
        aside ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 4px;
        }
        aside ul li a.active, aside ul li a:hover {
            background-color: #374151;
        }
        main {
            flex-grow: 1;
            padding: 30px;
            box-sizing: border-box;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }
        thead {
            background-color: #f9fafb;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        th {
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            font-size: 0.85em;
        }
        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <aside>
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.manage-users') }}" class="active">Manage Users</a></li>
            <li><a href="#">Manage Tracks</a></li>
            <li><a href="#">Manage Requirements</a></li>
            <li><a href="#">Manage Subjects</a></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>
        </ul>
    </aside>
    <main>
        <h1>Manage Users</h1>

        <h2>Students</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- Add other student fields if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name ?? 'N/A' }}</td>
                    <td>{{ $student->email ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Teachers / Instructors</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- Add other teacher fields if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
