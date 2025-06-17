<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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
        aside ul li a:hover {
            background-color: #374151;
        }
        main {
            flex-grow: 1;
            padding: 30px;
            box-sizing: border-box;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }
        .welcome {
            margin-bottom: 30px;
            font-size: 1.1em;
            color: #4b5563;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            flex: 1 1 200px;
        }
        .card h3 {
            margin: 0 0 10px 0;
            font-size: 1.1em;
            color: #374151;
        }
        .card p {
            font-size: 1.8em;
            margin: 0;
            color: #111827;
        }
        .card .pending {
            color: #dc2626;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
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
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Manage Users</a></li>
            <li><a href="#">Manage Tracks</a></li>
            <li><a href="#">Manage Requirements</a></li>
            <li><a href="#">Manage Subjects</a></li>
            <li><a href="{{ route('logout') }}"
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
        <h1>Admin Dashboard</h1>
        <p class="welcome">Welcome, Admin User!</p>

        <div class="cards">
            <div class="card">
                <h3>Total Users</h3>
                <p><?php echo e($totalUsers); ?></p>
            </div>
            <div class="card">
                <h3>Total Tracks</h3>
                <p><?php echo e($totalTracks); ?></p>
            </div>
            <div class="card">
                <h3>Total Strands</h3>
                <p><?php echo e($totalStrands); ?></p>
            </div>
            <div class="card">
                <h3>Total Subjects</h3>
                <p><?php echo e($totalSubjects); ?></p>
            </div>
            <div class="card">
                <h3>Pending Requirements</h3>
                <p class="pending"><?php echo e($pendingRequirements); ?></p>
            </div>
        </div>

        <h2>Students per Strand</h2>
        <table>
            <thead>
                <tr>
                    <th>Strand</th>
                    <th>Track</th>
                    <th>Students</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($studentsPerStrand as $strand): ?>
                <tr>
                    <td><?php echo e($strand['strand']); ?></td>
                    <td><?php echo e($strand['track']); ?></td>
                    <td><?php echo e($strand['students']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
