<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Tracks - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            color: #111827;
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
        ul {
            margin: 0;
            padding-left: 20px;
        }
        .btn-create {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <aside>
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.manage-users') }}">Manage Users</a></li>
            <li><a href="{{ route('admin.manage-tracks') }}" class="active">Manage Tracks</a></li>
            <li><a href="{{ route('admin.archived-tracks') }}">Manage Archives</a></li>
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
        <h1>Manage Tracks</h1>
        <a href="{{ route('tracks.create') }}" class="btn btn-primary btn-create">Create New Track</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Strands</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tracks as $index => $track)
                <tr>
                    <td>{{ $track['name'] }}</td>
                    <td>
                        <ul>
                            @foreach($track['strands'] as $strand)
                            <li>{{ $strand }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('tracks.edit', $index) }}" class="btn btn-success btn-sm me-2">Edit</a>
                        <form action="{{ route('tracks.archive', $index) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to archive this track?');">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Archive</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>