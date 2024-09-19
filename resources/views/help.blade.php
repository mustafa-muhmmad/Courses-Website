<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Project</title>
    <link rel="stylesheet" href="{{asset('css/help.css')}}">
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


    <section class="second">
        <h2 class="h2insecond">Select A Topic</h2>
        <p class="pmaininsecond">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        <section class="topicsinsecond">
            <div class="topic1">
                <div class="imagetopic1"><img src="{{asset('images/topic1.png')}}" alt=""></div>
                <p class="topic1p1"><a href="">Getting Started</a></p>
                <p class="topic1p2">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit.</p>
            </div>
            <div class="topic2">
                <div class="imagetopic2"><img src="{{asset('images/topic2.png')}}" alt=""></div>
                <p class="topic2p1"><a href="">Account</a></p>
                <p class="topic2p2">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit.</p>
            </div>
            <div class="topic3">
                <div class="imagetopic3"><img src="{{asset('images/topic3.png')}}" alt=""></div>
                <p class="topic3p1"><a href="">Enrollment</a></p>
                <p class="topic3p2">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit.</p>
            </div>
        </section>

        <section class="remindertopic">
            <div class="topic4">
                <div class="imagetopic4"><img src="{{asset('images/topic4.png')}}" alt=""></div>
                <p class="topic4p1"><a href="">Payment</a></p>
                <p class="topic4p2">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit.</p>
            </div>
            <div class="topic5">
                <div class="imagetopic5"><img src="{{asset('images/topic5.png')}}" alt=""></div>
                <p class="topic5p1"><a href="">Requirement</a></p>
                <p class="topic5p2">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit.</p>
            </div>
            <div class="topic6">
                <div class="imagetopic6"><img src="{{asset('images/topic6.png')}}" alt=""></div>
                <p class="topic6p1"><a href="">Troubleshoot</a></p>
                <p class="topic6p2">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit.</p>
            </div>
        </section>
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
