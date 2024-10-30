<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/students.css') }}">
    <link rel="shortcut icon" href="image/wallpaperflare.com_wallpaper (1).jpg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>
    <title>Students</title>
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

        .error-message {
            color: red;
            font-size: 1.5em;
            margin: 20px 0;
            text-align:center;
            margin-top: 60px ;
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
                <li><a href="{{ route('instructorswelcome-page') }}">Home</a></li>
                <li><a href="{{ route('instructorscourse-page') }}">Course</a></li>
                <li><a href="{{ route('instructorsstudents-page') }}">Students</a></li>
                <li><a href="{{ route('instructorscontact-page') }}">Contact</a></li>
                <li><a href="{{ route('instructorsStudentMessages-page') }}">Student Messages</a></li>
                <li><a href="{{ route('instructorslogout-page') }}"><i class="fa-solid fa-right-from-bracket"></i></a></li>
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
                <h1 style="color: white; font-weight: 600; font-size: 50px;"> Students</h1>
            </div>
            <div class="f3">
                <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
            </p>
        </div>
    </section>

    @if (isset($error))
        <div class="error-message">
            {{ $error }}
        </div>
    @endif

    @if ($students->isEmpty())
        <div class="no-students-message">
            <p style="color: red; font-size: 1.5em;text-align:center;margin-top:60px;margin-bottom: 60px">No students yet</p>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->phonenumber ? $student->phonenumber : 'Not Exist' }}</td>
                    <td>
                        <form action="{{ route('instructorDestroyStudents.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <footer class="footer">
        <div class="f">
            <h4><i class="fa-solid fa-book-open" style="color: #63E6BE;"></i> Coursey</h4>
            <p class="adress">Cairo Road 70, Office 99, Pacific Bay</p>
        </div>

        <div class="ff">
            <h4>SEND MESSAGE</h4>
            <p>We will be here to assist you whenever you need. Looking forward to hearing from you!</p>
            <p><i class="fa-solid fa-mobile-screen"></i> +123 456 789</p>
            <p><i class="fa-solid fa-envelope"></i> mail@coursy.io</p>
        </div>

        <div class="fff">
            <h4>PAGES</h4>
            <ul>
                <li><a href="{{ route('instructorswelcome-page') }}">Home</a></li>
                <li><a href="{{ route('instructorscourse-page') }}">Course</a></li>
                <li><a href="{{ route('instructorsstudents-page') }}">Students</a></li>
                <li><a href="{{ route('instructorscontact-page') }}">Contact</a></li>
                <li><a href="{{ route('instructorsStudentMessages-page') }}">Student Messages</a></li>
            </ul>
        </div>

        <div class="ffff">
            <h4>SOCIALS</h4>
            <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i> Facebook</a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i> Instagram</a>
            <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i> Twitter</a>
            <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i> YouTube</a>
        </div>
    </footer>
</body>
</html>
