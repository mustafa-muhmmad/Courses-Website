<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Instructors.css') }}">
    <link rel="shortcut icon" href="image/wallpaperflare.com_wallpaper (1).jpg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>
    <title>Instructors</title>
    <style>
        span {
            color: rgba(163, 11, 240, 0.681);
        }

        .form {
            padding: 10px;
            text-align: center;
            padding-top: 50px;
        }

        .A {
            padding: 20px 0;
            height: 450px;
        }

        .f2 h1 {
            margin-top: 0;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <section class="A">
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
        <div class="form">
            <div class="f1">
                <p>
                    <span style="letter-spacing: 3px;">— GURUS</span>
                </p>
            </div>
            <p>
            <div class="f2">
                <h1 style="color: white; font-weight: 600; font-size: 50px;"> Instructors</h1>
            </div>
            <div class="f3">
                <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
        </div>
    </section>
    <section class="A2">

        <div class="c1">
            <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/40.jpg" width="250px"
                height="250px">

            <h3>Mike Lewis</h3>
            <p> Bio: Seasoned computer science professor with a focus on data structures and algorithms.</p>
            <ul>
                <li><img src="{{asset('images/Participants.png')}}" width="100px" height="100px">Participants: 1.550
                    Students</li>
                <li><img src="{{asset('images/language.png')}}" width="15px" height="15px">Language: English</li>
                <li><img src="{{asset('images/activity.png')}}" width="15px" height="15px">Activity: 15 Courses
                </li>
                <li><img src="{{asset('images/link.png')}}" width="15px" height="15px">www.website.com</li>
            </ul>
        </div>
        <div class="c1">
            <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/38.jpg" width="280px"
                height="250px">

            <h3>Adam Jordan</h3>
            <p>Bio: Full-stack developer and coding bootcamp instructor, passionate about teaching web development.
            </p>
            <ul>
                <li><img src="{{asset('images/Participants.png')}}" width="15px" height="15px">Participants: 2000
                    Students</li>
                <li><img src="{{asset('images/language.png')}}" width="15px" height="15px">Language: Espanish</li>
                <li><img src="{{asset('images/activity.png')}}" width="15px" height="15px">Activity: 20 Courses
                </li>
                <li><img src="{{asset('images/link.png')}}" width="15px" height="15px">www.website.com</li>
            </ul>
        </div>
        <div class="c1">
            <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/29.jpg" width="280px"
                height="250px">

            <h3>John Doer</h3>
            <p>Bio: Cybersecurity expert and former hacker turned ethical hacker educator
            </p>
            <ul>
                <li><img src="{{asset('images/Participants.png')}}" width="15px" height="15px">Participants: 1200
                    Students</li>
                <li><img src="{{asset('images/language.png')}}" width="15px" height="15px">Language: English</li>
                <li><img src="{{asset('images/activity.png')}}" width="15px" height="15px">Activity: 8 Courses
                </li>
                <li><img src="{{asset('images/link.png')}}" width="15px" height="15px">www.website.com</li>
            </ul>
        </div>
    </section>
    <section class="A3">
        <div class="c1">
            <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/39.jpg" width="280px"
                height="250px">

            <h3>Tom Hanks</h3>
            <p>Bio: Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </p>
            <ul>
                <li><img src="{{asset('images/Participants.png')}}" width="15px" height="15px">Participants: 1.550
                    Students</li>
                <li><img src="{{asset('images/language.png')}}" width="15px" height="15px">Language: English</li>
                <li><img src="{{asset('images/activity.png')}}" width="15px" height="15px">Activity: 15 Courses
                </li>
                <li><img src="{{asset('images/link.png')}}" width="15px" height="15px">www.website.com</li>
            </ul>
        </div>
        <div class="c1">
            <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/41.jpg" width="280px"
                height="250px">

            <h3>Billy Joe</h3>
            <p>Bio: AI researcher and machine learning enthusiast, dedicated to demystifying complex algorithms.
            </p>
            <ul>
                <li><img src="{{asset('images/Participants.png')}}" width="15px" height="15px">Participants: 1700
                    Students</li>
                <li><img src="{{asset('images/language.png')}}" width="15px" height="15px">Language: English</li>
                <li><img src="{{asset('images/activity.png')}}" width="15px" height="15px">Activity: 6 Courses
                </li>
                <li><img src="{{asset('images/link.png')}}" width="15px" height="15px">www.website.com</li>
            </ul>
        </div>
        <div class="c1">
            <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/42.jpg" width="250px"
                height="250px">

            <h3>Shawn Roy</h3>
            <p>Bio: Cybersecurity expert and former hacker turned ethical hacker educator.
            </p>
            <ul>
                <li><img src="{{asset('images/Participants.png')}}" width="15px" height="15px">Participants: 600
                    Students</li>
                <li><img src="{{asset('images/language.png')}}" width="15px" height="15px">Language: English</li>
                <li><img src="{{asset('images/activity.png')}}" width="15px" height="15px">Activity: 15 Courses
                </li>
                <li><img src="{{asset('images/link.png')}}" width="15px" height="15px">www.website.com</li>
            </ul>
        </div>
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
