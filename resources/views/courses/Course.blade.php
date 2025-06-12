<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses - Senior Highschool Enrollment System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        a.button {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 10px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.button:hover {
            background-color: #2980b9;
        }
        .actions a {
            margin-right: 10px;
            color: #2980b9;
            text-decoration: none;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Courses</h1>
    <a href="{{ route('dashboard') }}" class="button" style="background-color: #3498db; margin-right: 10px;">Return to Dashboard</a>
    <a href="{{ route('courses.create') }}" class="button">Add Course</a>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
                <td class="actions">
                    <a href="{{ route('courses.show', $course) }}">View</a>
                    <a href="{{ route('courses.edit', $course) }}">Edit</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none;border:none;color:#e74c3c;cursor:pointer;padding:0;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
