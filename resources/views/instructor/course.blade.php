<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="{{ asset('css/Courses.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-image: url('../images/5.jpeg');
            background-size: cover;
            padding-top: 15px;
        }

        .navigation {
            display: flex;
            align-items: center;
            justify-content: space-around;
            font-size: large;
        }

        .logo {
            font-size: 25px;
            font-weight: 500;
            color: rgba(248,248,248,255);
        }

        .navigation li {
            list-style: none;
            display: inline-block;
            padding: 15px;
        }

        .navigation li:hover {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
        }

        .navigation li.login {
            background-color: rgba(88, 188, 155, 0.5);
            border-radius: 15px;
        }

        .navigation li a {
            color: white;
            font-weight: 500;
            text-decoration: none;
        }

        .speach {
            display: flex;
            flex-direction: column;
            color: rgba(248, 248, 248, 255);
            justify-content: center;
            align-items: center;
            padding: 60px 0;
        }

        .speach p.Learn {
            color: rgba(159, 180, 255, 255);
            font-weight: 500;
            font-size: medium;
            padding-bottom: 15px;
            letter-spacing: 2px;
        }

        .speach p.level {
            font-weight: 600;
            font-size: 70px;
            padding-bottom: 15px;
        }

        section {
            background-color: rgb(255, 245, 245);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
        }

        .card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 320px;
            margin: 20px;
            transition: transform 0.2s;
            position: relative;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .course-name {
            font-size: 1.6em;
            margin-bottom: 10px;
            color: #333;
        }

        .course-description {
            font-size: 1em;
            margin-bottom: 20px;
            color: #666;
            line-height: 1.5;
        }

        .course-link,
        .edit-button {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .course-link {
            background-color: #4CAF50;
            color: white;
        }

        .edit-button {
            background-color: #007BFF;
            color: white;
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .course-link:hover {
            background-color: #45a049;
        }

        .edit-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .footer {
            background-color: rgba(27, 32, 33, 255);
            color: white;
            display: flex;
            justify-content: space-evenly;
            padding: 60px 0;
        }

        .footer .f h4 {
            font-size: 25px;
        }

        .footer .f p.adress {
            padding-top: 25px;
            font-weight: 300;
            font-size: 20px;
        }

        .footer h4 {
            letter-spacing: 2px;
            font-size: large;
            font-weight: 500;
            padding-bottom: 25px;
        }

        .footer .ff p {
            font-weight: 400;
            padding-bottom: 20px;
        }

        .footer .ff i {
            color: rgba(153, 255, 205, 255);
            padding-right: 5px;
        }

        .footer .fff ul {
            list-style-type: none;
        }

        .footer .fff ul li a {
            color: white;
        }

        .footer .ffff a {
            color: white;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div>
        <header>
            <nav class="navigation">
                <div class="logo">
                    <i class="fa-solid fa-book-open" style="color: #63e6be"></i> Coursey
                </div>
                <ul class="list">
                    <li><a href="{{ route('instructorswelcome-page') }}">Home</a></li>
                    <li><a href="{{ route('instructorscourse-page') }}">Course</a></li>
                    <li><a href="{{ route('instructorsstudents-page') }}">Students</a></li>
                    <li><a href="{{ route('instructorscontact-page') }}">Contact</a></li>
                    <li><a href="{{ route('instructorsStudentMessages-page') }}">Student Messages</a></li>
                    <li><a href="{{ route('instructorslogout-page') }}"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                </ul>
            </nav>
            <div class="speach">
                <p class="Learn">- LEARN</p>
                <p class="level">Courses</p>
                <p class="lorem">Welcome to our courses section! Here, you'll find a list of all the courses we offer.</p>
            </div>
        </header>
    </div>

    <section>
        <div class="course-container">
            @if ($course)
                <div class="card">
                    <div class="course-name">{{ $course->name }}</div>
                    <div class="course-description">{{ $course->description }}</div>
                    <a href="{{ $course->link }}" class="course-link">View Course</a>
                    <a href="{{ route('instructorEditCourses.edit',$course->id)}}" class="edit-button">Edit</a>
                </div>
            @else
                <p>No course found.</p>
            @endif
        </div>
    </section>

    <footer class="footer">
        <div class="f">
            <h4><i class="fa-solid fa-book-open" style="color: #63E6BE;"></i> Coursey</h4>
            <p class="adress">Cairo Road 70, Office 99, Pacific Bay</p>
        </div>
        <div class="ff">
            <h4>SEND MESSAGE</h4>
            <p>We will be here to assist you whenever you need. Looking forward to hearing from you!</p>
            <p><i class="fa-solid fa-mobile-screen"></i> +123 456 789</p>
            <p><i class="fa-solid fa-envelope"></i> mail@coursy.io</p>
        </div>
        <div class="fff">
            <h4>PAGES</h4>
            <ul>
                <li><a href="{{ route('instructorswelcome-page') }}">Home</a></li>
                <li><a href="{{ route('instructorscourse-page') }}">Course</a></li>
                <li><a href="{{ route('instructorsstudents-page') }}">Students</a></li>
                <li><a href="{{ route('instructorscontact-page') }}">Contact</a></li>
                <li><a href="{{ route('instructorsStudentMessages-page') }}">Student Messages</a></li>
            </ul>
        </div>
        <div class="ffff">
            <h4>SOCIALS</h4>
            <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i> Facebook</a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i> Instagram</a>
            <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i> Twitter</a>
            <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i> YouTube</a>
        </div>
    </footer>
</body>
</html>
