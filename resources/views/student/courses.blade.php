<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="/public/css/Courses.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/student/courses.css') }}">
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
                    <li><a href="{{ route('studentswelcome-page') }}">Home</a></li>
                    <li><a href="{{ route('studentscourses-page') }}">Courses</a></li>
                    <li><a href="{{ route('studentShowInstructors.show') }}">Instructors</a></li>

                    <li><a href="{{ route('studentHelp-page') }}">Help</a></li>
                    <li><a href="{{ route('studentcontact-page') }}">Contact</a></li>
                    <li><a href="{{ route('studentsslogout-page') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
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
        <div class="courses-container" id="courses-list">
            @foreach($courses as $course)
            <div class="course-card" data-course-id="{{ $course->id }}">
                <h3>{{ $course->name }}</h3>
                <p>{{ $course->description }}</p>
                <form action="{{ route('studentEnrollCourses.enroll', ['courseId' => $course->id]) }}" method="POST"
                    style="display:inline">
                    @csrf
                    <button type="submit" class="course-link">Enroll</button>
                </form>
                <button class="about-button"
                    onclick="showNotice('{{ $course->name }}', '{{ $course->instructor_name }}', '{{ $course->link }}', '{{ $course->description }}')">About</button>
            </div>
            @endforeach
        </div>
    </section>

    <section class="my-courses">
        <h2>My Courses</h2>
        <div class="my-courses-container" id="my-courses-list">
            @if($myCourses->isEmpty())
            <p class="no-courses-message">No courses enrolled yet.</p>
            @else
            @foreach($myCourses as $course)
            <div class="course-card">
                <h3>{{ $course->name }}</h3>
                <p>{{ $course->description }}</p>
                <p>Instructor: {{ $course->instructor_name }}</p>
                <a href="{{ $course->link }}" class="visit-button">Visit</a>
                <form action="{{ route('studentDeleteCourses.destroy', $course->id) }}" method="POST"
                    style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mycourse-delete">Exit</button>
                </form>
            </div>
            @endforeach
            @endif
        </div>
    </section>

    <div id="course-notice" class="course-notice">
        <h3>Course Details</h3>
        <p id="notice-content"></p>
        <button onclick="closeNotice()">Close</button>
    </div>

    <div id="overlay" class="overlay" onclick="closeNotice()"></div>


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
    <script src="{{ asset('javascript/student/courses.js') }}"></script>

</body>

</html>
