<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Highschool Enrollment System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4a90e2, #50e3c2);
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 5rem auto;
            background: rgba(0, 0, 0, 0.6);
            padding: 2rem 3rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            text-align: center;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
        }
        p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }
        .btn {
            display: inline-block;
            background-color: #f39c12;
            color: #fff;
            padding: 1rem 2rem;
            margin: 0 1rem;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.6);
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #d87e04;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Senior Highschool Enrollment System</h1>
        <p>Enroll and register for your desired courses easily and securely.</p>
        <a href="{{ route('register') }}" class="btn">Register an Account</a>
        <a href="{{ route('students.index') }}" class="btn">View Students</a>
        <a href="{{ route('courses.index') }}" class="btn">View Courses</a>
        <a href="{{ route('enrollments.index') }}" class="btn">View Enrollments</a>
    </div>
</body>
</html>
