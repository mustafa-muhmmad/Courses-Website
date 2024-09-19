<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/2354370efa.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Courses</title>
    <link rel="stylesheet" href="{{asset('css/singleCourse.css')}}">
</head>


<body>
    <header>
        <nav class="navigation">

            <div class="logo">
                <i class="fa-solid fa-book-open" style="color: #63e6be"></i> Coursey
            </div>

            <ul class="list">
                <li><a href="{{ route('home-page') }}">Home</a></li>
                <li><a href="{{ route('courses-page') }}">Courses</a></li>
                <li><a href="{{ route('instructor-page') }}">Instructors</a></li>
                <li>
                    <a href="{{ route('singlecourse-page') }}">Single course</a>
                </li>
                <li><a href="{{ route('help-page') }}">Help</a></li>
                <li><a href="{{ route('contact-page') }}">Contact</a></li>
                <li class="login">
                    <a href="{{ route('login-page') }}"><i class="fa-regular fa-user"></i></a>
                </li>
            </ul>

        </nav>
        <div class="content">

            <div class="right">
                <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/29.jpg"
                    alt="Browser doesn't support this tag" width="300" height="300">
            </div>

            <div class="left">
                <h3 class="learn-word" style="letter-spacing: 3px; font-weight: 400;">-Learn</h3>
                <h1 style="font-size: 48px;">Web Design Course</h1>
                <div class="course-description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris</p>
                    <br>
                    <div class="first-button">
                        <a href="{{route('login-page')}}">Join Now</a>
                    </div>
                </div>
            </div>

        </div>
    </header>


    <div class="second">
        <div class="eww">

            <h2>What you will learn</h2>
            <p style="width: 550px; line-height: 2.5;">In this comprehensive course, you'll delve into the foundational
                concepts and practical skills essential in the field of computer science. From mastering programming
                languages like Python and Java to understanding data structures and algorithms, you'll develop a strong
                foundation in software development. Additionally, you'll explore topics such as database management,
                computer networks, and cybersecurity, gaining insights into building robust and secure systems.
                Throughout the course, hands-on projects and problem-solving exercises will hone your critical thinking
                and
                analytical skills. By the end, you'll emerge equipped with the knowledge and expertise to tackle diverse
                challenges in the dynamic field of computer science.</p>

        </div>
        <div class="right1">
            <div>
                <img class="we" src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/40.jpg"
                    alt="Browser doesn't support this tag" width="300" height="300" style="margin-top: 30px;">
            </div>
            <div class="inset">
                <ul>
                    <li>
                        Instructors:
                        Mike lius
                    </li>
                    <li>
                        Participants
                        1,550 Students
                    </li>
                    <li>
                        Language
                        English
                    </li>
                    <li>
                        Updated
                        June 2022
                    </li>
                </ul>
            </div>
        </div>

    </div>


    <div class="third">
        <div class="end">
            <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/32.jpg"
                alt="Browser doesn't support this tag" width="400" height="600">
        </div>
        <div class="content-behind">
            <h1 style="font-size: 40px;">Grow Your Skills, easy Learning.Start now!</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum fugit ipsum dolor sit, amet consectetur
                adipisicing eli</p>
            <a href="{{route('login-page')}}" class="socend-Button">Join Now</a>
        </div>
    </div>

    <footer class="footer">

        <div class="f">
            <h4><i class="fa-solid fa-book-open" style="color: #63E6BE;"></i> Coursey</h4>
            <p class="adress">Cairo Road 70, Office 99, Pacific Bay</p>
        </div>

        <div class="ff">
            <h4>SEND MESSAGE</h4>
            <p>we will be here to assist you whenever you need. Looking forward to hearing from you!</p>
            <p><i class="fa-solid fa-mobile-screen"></i> +123 456 789</p>
            <p><i class="fa-solid fa-envelope"></i> mail@coursy.io</p>


        </div>

        <div class="fff">
            <h4>PAGES</h4>
            <ul>
                <li><a href="{{ route('courses-page') }}">Courses</a></li>
                <li><a href="{{ route('login-page') }}">Login</a></li>
                <li><a href="{{ route('register-page') }}">Register</a></li>
                <li><a href="{{ route('help-page') }}">FAQ</a></li>
            </ul>
        </div>

        <div class="ffff">
            <h4>SOCIALS</h4>
            <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i> Facebook</a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i> instgram</a>
            <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i> twitter</a>
            <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i> Youtube</a>
        </div>
    </footer>
</body>

</html>
