<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students - Senior Highschool Enrollment System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
            color: black;
        }
        h1 {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color: black;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
            color: black;
        }
        th {
            background-color: #1DB954;
            color: white;
        }
        a.button {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 10px;
            background-color: #1DB954;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.button:hover {
            background-color: #17a44c;
        }
        .actions a {
            margin-right: 10px;
            color: #1DB954;
            text-decoration: none;
        }
        .actions a:hover {
            text-decoration: underline;
        }
        button {
            background: none;
            border: none;
            color: #e74c3c;
            cursor: pointer;
            padding: 0;
        }
    </style>
</head>
<body>
    <h1>Students</h1>
    <a href="{{ route('dashboard') }}" class="button" style="background-color: #1DB954; margin-right: 10px;">Return to Dashboard</a>
    <a href="{{ route('students.create') }}" class="button">Add Student</a>
    @if(session('success'))
        <p style="color: white;">{{ session('success') }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td class="actions">
                    <a href="{{ route('students.show', $student) }}">View</a>
                    <a href="{{ route('students.edit', $student) }}">Edit</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
