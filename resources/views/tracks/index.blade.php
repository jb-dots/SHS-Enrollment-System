<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tracks - Senior Highschool Enrollment System</title>
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
            vertical-align: top;
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
        button {
            background: none;
            border: none;
            color: #e74c3c;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 5px;
        }
        button.edit {
            background-color: #fbbf24;
            color: black;
        }
        button.edit:hover {
            background-color: #d1a10a;
        }
        button.delete {
            background-color: #f87171;
            color: white;
        }
        button.delete:hover {
            background-color: #c53030;
        }
        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Tracks</h1>
    <a href="{{ route('dashboard') }}" class="button">Return to Dashboard</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Strands</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tracks as $track)
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
                    <button class="edit">Edit</button>
                    <button class="delete">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
