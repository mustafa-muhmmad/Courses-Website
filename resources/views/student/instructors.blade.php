<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructors</title>
    <link rel="stylesheet" href="{{ asset('css/student/instructors.css') }}">
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="A">
        <nav class="navigation">
            <div class="logo">
                <i class="fa-solid fa-book-open" style="color: #63e6be"></i> Coursey
            </div>

            <ul class="list">
                <li><a href="{{ route('studentswelcome-page') }}">Home</a></li>
                <li><a href="{{ route('studentscourses-page') }}">Courses</a></li>
                <li><a href="{{ route('studentShowInstructors.show') }}">Instructors</a></li>

                <li><a href="{{ route('studentHelp-page') }}">Help</a></li>
                <li><a href="{{ route('studentcontact-page') }}">Contact</a></li>
                <li><a href="{{ route('studentsslogout-page') }}"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </nav>
        <div class="form">
            <div class="f1">
                <p>
                    <span style="letter-spacing: 3px;color:rgba(163, 11, 240, 0.681)">— GURUS</span>
                </p>
            </div>
            <p>
            <div class="f2">
                <h1  style="color: white; font-weight: 600; font-size: 50px;"> Instructors</h1>
            </div>
            <div class="f3">
                <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
        </div>
    </section>

    <section class="instructor-section">
    <h2>Instructors</h2>
    <div class="instructor-container">
    @foreach($instructors as $instructor)
        <div class="instructor-card">
            <h3>{{ $instructor->name }}</h3>
            <p>Course: {{ $instructor->course->name ?? 'No course assigned' }}</p>
            <p><img src="{{asset('images/Participants.png')}}" width="15px" height="15px">Participants: <span id="participants"></span></p>
            <p><img src="{{asset('images/language.png')}}" width="15px" height="15px">Language: English</p>
        </div>
    @endforeach
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
                <p><i  class="fa-solid fa-mobile-screen"></i>  +123 456 789</p>
                <p><i  class="fa-solid fa-envelope"></i>  mail@coursy.io</p>


        </div>

        <div class="fff">
                <h4>PAGES</h4>
                <ul>
                    <li><a href="{{ route('studentswelcome-page') }}">Home</a></li>
                    <li><a href="{{ route('studentscourses-page') }}">Courses</a></li>
                    <li><a href="{{ route('studentShowInstructors.show') }}">Instructors</a></li>
                    <li><a href="{{ route('studentHelp-page') }}">faQ</a></li>
                    <li><a href="{{ route('studentcontact-page') }}">Contact</a></li>
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


<script src="{{ asset('javascript/student/instructors') }}"></script>
</body>
</html>
