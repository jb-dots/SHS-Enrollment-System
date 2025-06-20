<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Archives - Admin Dashboard</title>
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
            padding: 0 20px; /* Adjusted to remove top space */
            box-sizing: border-box;
            height: 100vh; /* Ensure sidebar takes full height */
            position: sticky;
            top: 0;
        }
        aside h2 {
            font-size: 1.5em;
            margin: 20px 0 20px 0; /* Reduced top margin to minimize wasted space */
            border-bottom: 1px solid #374151;
            padding-bottom: 10px;
        }
        aside ul {
            list-style: none;
            padding: 0;
            margin-top: 0; /* Remove default margin */
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
        .table-responsive {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <aside>
        <h2>Admin Dashboard</h2> <!-- Changed from h1 to h2 for consistency -->
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.manage-users') }}">Manage Users</a></li>
            <li><a href="{{ route('admin.manage-tracks') }}">Manage Tracks</a></li>
            <li><a href="{{ route('admin.archived-tracks') }}" class="active">Manage Archives</a></li>
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
        <h1 class="mb-4">Archived Tracks</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Strands</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tracks as $item)
                    <tr>
                        <td>{{ $item['track']['name'] }}</td>
                        <td>
                            <ul class="list-unstyled">
                @foreach($item['track']['strands'] as $strand)
                <li>{{ $strand }}</li>
                @endforeach
            </ul>
        </td>
        <td>
            <form action="{{ route('tracks.restore', $item['index']) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary">Restore</button>
            </form>
        </td>
    </tr>
    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>