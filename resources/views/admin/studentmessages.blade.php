<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/InstructorMessages.css') }}">
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
                <li><a href="{{ route('adminswelcome-page') }}">Home</a></li>
                <li><a href="{{ route('adminscourses-page') }}">Courses</a></li>
                <li><a href="{{ route('adminsinstructor-page') }}">Instructors</a></li>
                <li><a href="{{ route('adminsstudents-page') }}">Students</a></li>
                <li><a href="{{ route('adminsInstructorMessages-page') }}">Instructors Messages</a></li>
                <li><a href="{{ route('adminsStudentMessages-page') }}">Students Messages</a></li>
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
                <h1 style="color: white; font-weight: 600; font-size: 50px;">Student Messages</h1>
            </div>
            <div class="f3">
                <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
        </div>
    </section>


    <section>

        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>address</th>
                    <th>gender</th>
                    <th>Phone Number</th>
                    <th>Course Name</th>
                    <th>Question</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formattedMessages as $message)
                <tr>
                    <td>{{ $message['firstname'] }}</td>
                    <td>{{ $message['lastname'] }}</td>
                    <td>{{ $message['email'] }}</td>
                    <td>{{ $message['address'] }}</td>
                    <td>{{ $message['gender'] }}</td>
                    <td>{{ $message['phonenumber'] }}</td>
                    <td>{{ $message['course_name'] }}</td>
                    <td>{{ $message['question'] }}</td>
                    <td>{{ $message['message'] }}</td>
                    <td>
                        <form action="{{ route('adminDestroyStudentMessages.destroy', $message['message_id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        @if(!is_null($message['course_name']) && $message['course_name'] !== 'For Web Page')
                        <form action="{{ route('updateMessageShowStatus', $message['message_id']) }}" method="POST">
                            @csrf
                            <button type="submit" style="background-color:#007bff">Forward</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


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
                <li><a href="{{ route('adminswelcome-page') }}">Home</a></li>
                <li><a href="{{ route('adminscourses-page') }}">Courses</a></li>
                <li><a href="{{ route('adminsinstructor-page') }}">Instructors</a></li>
                <li><a href="{{ route('adminsstudents-page') }}">Students</a></li>
                <li><a href="{{ route('adminsInstructorMessages-page') }}">Instructors Messages</a></li>
                <li><a href="{{ route('adminsStudentMessages-page') }}">Students Messages</a></li>
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
