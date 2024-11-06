<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home-Coursey</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="/public/css/home.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>



</head>

<body>
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

        <div class="slogan">
            <div class="img">
                <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/27.jpg"
                    alt="Your browser doesn't support this tag" />
            </div>

            <div class="speach">
                <p class="Learn">- LEARN</p>
                <p class="level">Take a course and improve your skills</p>
                <p class="lorem">
                    Embark on a learning journey and watch your skills soar to new
                    heights. With each course you take, you'll unlock fresh insights,
                    master new techniques, and discover your potential like never
                    before. Seize the opportunity to expand your knowledge, enrich your
                    expertise, and achieve your goals. Start today and pave the way for
                    a brighter, more fulfilling future!
                </p>
            </div>
        </div>
        <br />
        <br />
        <br />
    </header>

    <div class="features">
        <div class="slogan2">
            <p class="feature">- FEATURES</p>
            <p class="l">Learn anything, anytime, anywhere...</p>
            <ul>
                <li>
                    <i class="fa-regular fa-square-check"></i> Certified instructors
                </li>
                <li><i class="fa-regular fa-square-check"></i> Easy registration</li>
                <li>
                    <i class="fa-regular fa-square-check"></i> Simple payment methods
                </li>
                <li>
                    <i class="fa-regular fa-square-check"></i> Access anywhere 24/7
                </li>
            </ul>
        </div>

        <div class="img2">
            <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/31.jpg"
                alt="your browser doesn't support this tag" />
            <div class="active">
                <p class="i"><i class="fa-solid fa-book-open-reader"></i></p>
                <p class="ii" id="activeCourses">150 +</p>
                <p class="iii">ACTIVE COURSES</p>
            </div>
        </div>
    </div>

    <div class="testimonials">
        <div class="inner">
            <h1 style="color: white">What They Said</h1>
            <div class="border"></div>

            <div class="row">
                <div class="col">
                    <div class="testimonial">
                        <img src="{{asset('images/i1.jpeg')}}" alt="" />
                        <div class="name">John Camp</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                        <p>
                            I've taken several courses from this website, and I must say,
                            I'm thoroughly impressed! The content is engaging, the
                            instructors are knowledgeable!
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="testimonial">
                        <img src="{{asset('images/i2.jpeg')}}" alt="" />
                        <div class="name">David</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <p>
                            As someone who's always on the lookout for quality courses
                            online, I stumbled upon this website, and I'm glad I did!
                            Definitely worth checking out!
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="testimonial">
                        <img src="{{asset('images/i3.jpeg')}}" alt="" />
                        <div class="name">Adam</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <p>
                            I've been using this website for a while now, and I'm
                            consistently impressed by the variety of courses available.
                            Whether you're a beginner or an expert, there's something for
                            everyone!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Blog">
        <div class="Blog-t">
            <div class="sp">
                <p class="Learn" style="letter-spacing: 3px; padding-top: 22px; padding-bottom: 22px">
                    - BLOG
                </p>
                <h1 class="level" style="font-size: 55px">Blog Posts</h1>
                <p class="lorem" style="width: 350px; padding-top: 22px; padding-bottom: 22px">
                    Demystifying Online Learning: Finding the Right Courses for You
                </p>
                <a>View All Posts
                    &#8594;</a>
            </div>
        </div>

        <div class="Blog-p">
            <div class="c1">
                <div class="p1">
                    <a href="https://blog.skolera.com/free-educational-apps-for-students/" target="_blank"><img
                            src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/34-768x512.jpg"
                            alt="Browser doesn't support this img" /></a>
                    <a href="https://blog.skolera.com/free-educational-apps-for-students/" target="_blank">
                        <p>Free Educational Apps For Online Learning</p>
                    </a>
                </div>
                <div class="p2">
                    <a href="https://academicsupport.uw.edu/study-skills/online-learning/ten-successful-online-study-habits/"  target="_blank"><img
                            src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/35-768x512.jpg"
                            alt="Browser doesn't support this img" /></a>
                    <a href="https://academicsupport.uw.edu/study-skills/online-learning/ten-successful-online-study-habits/"  target="_blank">
                        <p>Ten Successful Online Study Hapits</p>
                    </a>
                </div>
            </div>
            <div class="c2">
                <div class="p3">
                    <a href="https://www.oxfordlearning.com/tips-for-studying-at-home/"  target="_blank"><img
                            src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/36-768x512.jpg"
                            alt="Browser doesn't support this img" /></a>
                    <a href="https://www.oxfordlearning.com/tips-for-studying-at-home/"  target="_blank">
                        <p>How To Study Effectivly At Home</p>
                    </a>
                </div>
                <div class="p4">
                    <a href="https://online.umn.edu/story/15-tips-succeed-online-class"  target="_blank"><img
                            src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/37-768x512.jpg"
                            alt="Browser doesn't support this img" /></a>
                    <a href="https://online.umn.edu/story/15-tips-succeed-online-class" target="_blank">
                        <p>Tips For Successful Online Classes</p>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="f">
            <h4>
                <i class="fa-solid fa-book-open" style="color: #63e6be"></i> Coursey
            </h4>
            <p class="adress">Cairo Road 70, Office 99, Pacific Bay</p>
        </div>

        <div class="ff">
            <h4>SEND MESSAGE</h4>
            <p>
                we will be here to assist you whenever you need. Looking forward to
                hearing from you!
            </p>
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
    <script src="{{ asset('javascript/home.js') }}"></script>
</body>

</html>
