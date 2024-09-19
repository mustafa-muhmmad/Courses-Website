<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="/public/css/Courses.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/Courses.css') }}">
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>

</head>

<body>
    <div>
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

            <div class="speach">
                <p class="Learn">- LEARN</p>
                <p class="level">Courses</p>
                <p class="lorem">Welcome to our courses section! Here, you'll find a list of all the courses we offer.
                </p>

                <br>
                <br>
                <br>
        </header>

    </div>
    <section>

        <ul class="m">
            @foreach($courses as $course)
            <li data-text="{{ $course->name }}"><a href="{{ $course->link }}">{{ $course->name }}</a></li>
            @endforeach
        </ul>

    </section>

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
                <li> <a href="{{ route('login-page') }}">Login</a> </li>
                <li> <a href="{{ route('register-page') }}">Register</a> </li>
                <li> <a href="{{ route('help-page') }}">FAQ</a> </li>
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
