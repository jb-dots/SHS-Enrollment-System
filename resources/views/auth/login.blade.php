<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Welcome - Senior Highschool Enrollment System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4a90e2, #50e3c2);
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
        }
        .container {
            display: flex;
            max-width: 1100px;
            margin: 3rem auto;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            overflow: hidden;
            min-height: 500px;
        }
        .left-panel {
            flex: 1.2;
            padding: 3rem 3rem 3rem 4rem;
            background: transparent;
            color: #fff;
        }
        .left-panel h1 {
            font-size: 2.5rem;
            margin-bottom: 0.2rem;
            font-weight: bold;
        }
        .left-panel h1 .highlight {
            color: #f39c12;
        }
        .left-panel h2 {
            font-weight: normal;
            color: #ddd;
            margin-top: 0;
            margin-bottom: 2rem;
            font-size: 1.2rem;
        }
        .left-panel p {
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 1.5rem;
            color: #ddd;
        }
        .left-panel p strong {
            color: #f39c12;
        }
        .left-panel p a {
            color: #f39c12;
            text-decoration: none;
            font-weight: bold;
        }
        .left-panel p a:hover {
            text-decoration: underline;
        }
        .right-panel {
            flex: 0.8;
            background: transparent;
            padding: 3rem 3rem;
            box-shadow: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .logo {
            width: 240px;
            margin-bottom: 1.5rem;
        }
        .portal-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #f39c12;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .campus-name {
            font-size: 1.2rem;
            color: #ddd;
            margin-bottom: 2rem;
            text-align: center;
        }
        form {
            width: 100%;
            max-width: 320px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem 1rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
            background-color: #2c3e50;
            color: #fff;
        }
        input::placeholder {
            color: #a0aec0;
        }
        button.login-btn {
            width: 100%;
            background-color: #f39c12;
            color: #2c3e50;
            padding: 0.9rem;
            font-size: 1.1rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 1rem;
            transition: background-color 0.3s ease;
        }
        button.login-btn:hover {
            background-color: #d87e04;
            color: #1a202c;
        }
        .forgot-password {
            font-size: 0.85rem;
            color: #ddd;
            text-align: center;
            margin-top: 0.5rem;
        }
        .forgot-password a {
            color: #f39c12;
            text-decoration: none;
            font-weight: bold;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .create-password {
            display: inline-block;
            background-color: #f39c12;
            color: #2c3e50;
            padding: 0.2rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 3px;
            margin-left: 0.3rem;
            text-decoration: none;
        }
        .create-password:hover {
            background-color: #d87e04;
            color: #1a202c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Welcome to <span class="highlight">NextGen</span></h1>
            <h2>We strive to do better.</h2>
            <p><strong>The DepEd Vision -- <a href="https://www.deped.gov.ph/about-deped/vision-mission-core-values-and-mandate/">click here</a></strong><br />
                We dream of Filipinos, who passionately love their country, and whose values and competencies, enable them to realize their full potential, and contribute meaningfully to building the nation. As a learner-centered public institution, the Department of Education, continuously improves itself, to better serve its stakeholders.<p>
            <strong>The DepEd Mission -- <a href="https://www.deped.gov.ph/about-deped/vision-mission-core-values-and-mandate/">click here</a></strong><br />
                To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where: Students learn in a child-friendly, gender-sensitive, safe, and motivating environment. Teachers facilitate learning and constantly nurture every learner. Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen. Family, community, and other stakeholders are actively engaged and share responsibility for developing life-long learners.</p>
            <p><strong>Our Core Values <a href="https://www.deped.gov.ph/about-deped/vision-mission-core-values-and-mandate/">Click Here</a></strong><br />
                Maka-Diyos, Maka-tao, Makakalikasan, Makabansa</p>
            <p><strong>Register -- <a href="http://127.0.0.1:8000/register">Click Here</a></strong><br />
                If you want to register press "Click Here" to register.</p>
        </div>
        <div class="right-panel">
            <img src="https://i.postimg.cc/PJ0xyRwD/asd-removebg-preview-1.png/400px-asd-removebg-preview-1.png" alt="Laravel Logo" class="logo" />
            <div class="campus-name">Main Campus</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="text" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit" class="login-btn">Login</button>
            </form>
            <div class="forgot-password">
                <a href="#">Forgot Your Password?</a>
            </div>
        </div>
    </div>
</body>
</html>
