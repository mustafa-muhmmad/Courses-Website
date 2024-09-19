<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Project</title>
    <link rel="stylesheet" href="{{asset('css/student/help.css')}}">
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>
</head>


<body>
    <section class="first">
        <div class="mainnav">
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
        </div>
        <hr>
        <div class="aftermain1">
            <img class="image1aftermain1"
                src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/44.jpg" alt="Error">
            <div class="yellowback"></div>
            <div class="paragraph">
                <p class="p1"> &lowbar; Support</p>
                <p class="p2">Help Center</p>
                <p class="p3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris.</p>
            </div>
        </div>
    </section>




    <section class="last">
        <h2 class="h2inlast">FAQs</h2>
        <span class="main">Troubleshooting login and account issues</span>
        <span class="temp">Arcu odio ut sem nulla pharetra. Sodales ut eu sem integer vitae justo eget magna. Quis
            viverra nibh cras pulvinar mattis nunc sed. Est ultricies integer quis auctor elit sed vulputate mi sit.
            Fusce id velit ut tortor pretium viverra suspendisse potenti nullam. Consectetur adipiscing elit duis
            tristique sollicitudin nibh sit. Sit amet luctus venenatis lectus magna.</span>

        <span class="main">Apply for Financial Aid or a Scholarship</span>
        <span class="temp">Arcu odio ut sem nulla pharetra. Sodales ut eu sem integer vitae justo eget magna. Quis
            viverra nibh cras pulvinar mattis nunc sed. Est ultricies integer quis auctor elit sed vulputate mi sit.
            Fusce id velit ut tortor pretium viverra suspendisse potenti nullam. Consectetur adipiscing elit duis
            tristique sollicitudin nibh sit. Sit amet luctus venenatis lectus magna.</span>

        <span class="main">Downloading course resources</span>
        <span class="temp">Arcu odio ut sem nulla pharetra. Sodales ut eu sem integer vitae justo eget magna. Quis
            viverra nibh cras pulvinar mattis nunc sed. Est ultricies integer quis auctor elit sed vulputate mi sit.
            Fusce id velit ut tortor pretium viverra suspendisse potenti nullam. Consectetur adipiscing elit duis
            tristique sollicitudin nibh sit. Sit amet luctus venenatis lectus magna.</span>

        <span class="main">How to download your certificate</span>
        <span class="temp">Arcu odio ut sem nulla pharetra. Sodales ut eu sem integer vitae justo eget magna. Quis
            viverra nibh cras pulvinar mattis nunc sed. Est ultricies integer quis auctor elit sed vulputate mi sit.
            Fusce id velit ut tortor pretium viverra suspendisse potenti nullam. Consectetur adipiscing elit duis
            tristique sollicitudin nibh sit. Sit amet luctus venenatis lectus magna.</span>

        <span class="main">How to find your missing course</span>
        <span class="templ">Arcu odio ut sem nulla pharetra. Sodales ut eu sem integer vitae justo eget magna. Quis
            viverra nibh cras pulvinar mattis nunc sed. Est ultricies integer quis auctor elit sed vulputate mi sit.
            Fusce id velit ut tortor pretium viverra suspendisse potenti nullam. Consectetur adipiscing elit duis
            tristique sollicitudin nibh sit. Sit amet luctus venenatis lectus magna.</span>
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
</body>

</html>
