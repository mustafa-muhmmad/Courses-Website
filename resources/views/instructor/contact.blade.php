<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
</head>

<body>
    <div class="header-nav">
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
                <li><a href="{{ route('instructorslogout-page') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
                </li>
            </ul>
        </nav>
        <div class="header-content">
            <h4 class="wee5">_ GET IN TOUCH</h4>
            <h1>Contact</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>




    <div class="content">
        <div class="wee3">
            <div class="wee">
                <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/43.jpg"
                    alt="Browser doesn't support this image" width="300" height="400">
            </div>
            <div class="wee2">
                <h5>_ Send Message</h5>
                <h1>Let Us Help You Find The Right Path To Success</h1>
                <form action="{{ route('instructorContactAdmin.contact') }}" method="post">
                    @csrf
                    <input type="text" name="firstname" require placeholder="First Name">
                    <br>
                    <input type="text" name="lastname" require placeholder="Last Name">
                    <br>
                    <input type="email" name="email" require placeholder="Email"
                        value="{{ Session::get('instructor_email') }}" disabled>
                    <br>
                    <input type="text" name="question" require placeholder="General Question">
                    <input type="text" name="message" require placeholder="Your message">
                    <br>
                    <input type="submit" value="Send Message" name="send">
                </form>

            </div>
        </div>
    </div>
</body>

</html>
