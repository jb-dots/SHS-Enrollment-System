<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Enrollments - Senior Highschool Enrollment System</title>
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
            vertical-align: middle;
            color: black;
        }
        th {
            background-color: #00B4DB;
            color: white;
            font-weight: 600;
        }
        a.button {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 10px;
            background-color: #00B4DB;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.button:hover {
            background-color: #1E90FF;
        }
        button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 5px;
            font-size: 0.85rem;
        }
        button.approve {
            background-color: #fbbf24;
            color: black;
        }
        button.approve:hover {
            background-color: #d1a10a;
        }
        button.reject {
            background-color: #fbbf24;
            color: black;
        }
        button.reject:hover {
            background-color: #d1a10a;
        }
        button.delete {
            background-color: #f87171;
            color: white;
        }
        button.delete:hover {
            background-color: #c53030;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Enrollments</h1>
        <a href="{{ route('dashboard') }}" class="button">Back to Dashboard</a>
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Strand</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</td>
                    <td>{{ $enrollment->course->name }}</td>
                    <td>{{ $enrollment->status }}</td>
                    <td>
                        @if($enrollment->status === 'pending')
                            <form action="{{ route('enrollments.approve', $enrollment) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="approve">Approve</button>
                            </form>
                            <form action="{{ route('enrollments.reject', $enrollment) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="reject">Reject</button>
                            </form>
                        @endif
                        <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
