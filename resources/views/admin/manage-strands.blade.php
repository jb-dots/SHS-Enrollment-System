<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage Strands - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
            background-color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 0.75rem;
            text-align: left;
        }
        th {
            background-color: #06b6d4;
            color: white;
        }
        .btn {
            padding: 0.375rem 0.75rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }
        .btn-warning {
            background-color: #f59e0b;
            color: white;
        }
        .btn-danger {
            background-color: #ef4444;
            color: white;
        }
        .btn-danger:hover, .btn-warning:hover, .btn-primary:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>
    <aside>
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.manage-users') }}">Manage Users</a></li>
            <li><a href="{{ route('admin.manage-tracks') }}">Manage Tracks</a></li>
            <li><a href="{{ route('admin.archived-tracks') }}">Manage Archives</a></li>
            <li><a href="{{ route('admin.manage-strands') }}" class="active">Manage Strands</a></li>
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
        <h1>Manage Strands</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Track</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($strands as $strand)
                <tr>
                    <td>{{ $strand->name }}</td>
                    <td>{{ $strand->track }}</td>
                    <td>
<a href="{{ route('admin.strands.edit', $strand->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('admin.strands.destroy', $strand->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this strand?')">Delete</button>
</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
