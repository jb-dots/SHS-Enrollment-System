<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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
        .welcome {
            margin-bottom: 30px;
            font-size: 1.1em;
            color: #4b5563;
        }
    </style>
</head>
<body>
    <aside>
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a></li>
            <li><a href="{{ route('admin.manage-users') }}">Manage Users</a></li>
            <li><a href="{{ route('admin.manage-tracks') }}">Manage Tracks</a></li>
            <li><a href="{{ route('admin.archived-tracks') }}">Manage Archives</a></li>
            <li><a href="{{ route('admin.manage-strands') }}">Manage Strands</a></li>
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
        <h1 class="mb-3">Admin Dashboard</h1>
        <p class="welcome">Welcome, Admin User!</p>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fs-6 text-muted">Total Users</h3>
                        <p class="card-text fs-3"><?php echo e($totalUsers); ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fs-6 text-muted">Total Tracks</h3>
                        <p class="card-text fs-3"><?php echo e($totalTracks); ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fs-6 text-muted">Total Strands</h3>
                        <p class="card-text fs-3"><?php echo e($totalStrands); ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fs-6 text-muted">Total Subjects</h3>
                        <p class="card-text fs-3"><?php echo e($totalSubjects); ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fs-6 text-muted">Pending Requirements</h3>
                        <p class="card-text fs-3 text-danger"><?php echo e($pendingRequirements); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mb-3">Students per Strand</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Strand</th>
                        <th>Track</th>
                        <th>Students</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studentsPerStrand as $strand)
                    <tr>
                        <td>{{ $strand['strand'] }}</td>
                        <td>{{ $strand['track'] }}</td>
                        <td>{{ $strand['students'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>