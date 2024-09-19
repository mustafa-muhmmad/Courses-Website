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
        <li><a href="{{ route('studentswelcome-page') }}">Home</a></li>
        <li><a href="{{ route('studentscourses-page') }}">Courses</a></li>
        <li><a href="{{ route('studentShowInstructors.show') }}">Instructors</a></li>
        <li><a href="{{ route('studentHelp-page') }}">Help</a></li>
        <li><a href="{{ route('studentcontact-page') }}">Contact</a></li>
        <li><a href="{{ route('studentsslogout-page') }}"><i class="fa-solid fa-right-from-bracket"></i></a></li>
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
                <img src="https://demo.eightheme.com/coursey/wp-content/uploads/sites/18/2022/06/43.jpg" alt="Browser doesn't support this image" width="300" height="400">
            </div>
            <div class="wee2">
                <h5>_ Send Message</h5>
                <h1>Let Us Help You Find The Right Path To Success</h1>
                <form action="{{ route('studentContactAdmin.contact') }}" method="post">
                    @csrf
                    <input type="text" name="firstname" required placeholder="First Name">
                    <br>
                    <input type="text" name="lastname" required placeholder="Last Name">
                    <br>
                    <input type="email" name="email" value="{{ Session::get('student_email') }}" disabled>
                    <br>
                    <label for="instructor_id"><b>Your question about</b></label>
                    <select name="instructor_id" id="instructor_id" class="form-select" >
                        <option value="" selected>Web Page</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }} Course</option>
                        @endforeach
                    </select>
                    <br>
                    <br>
                    <input type="text" name="question" required placeholder="General Question">
                    <br>
                    <input type="text" name="message" required placeholder="Your message">
                    <br>
                    <input type="submit" value="Send Message" name="send">
                </form>


            </div>
        </div>
    </div>
</body>

</html>
