<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="/public/css/Courses.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/admin/courses.css') }}">
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

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Instructor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->instructor->name ?? 'No Instructor Assigned' }}</td>
                    <td>
                        {{-- <!-- <a href="{{route('tracks.show',$track->id)}}"><button>Show Students</button></a>-->
                        --}}
                        <a href="{{ $course->link }}"><button>Show Course</button></a>
                        {{--<!-- <a href="{{route('tracks.edit',$track->id)}}"><button>Edit</button></a> -->--}}
                        <a href="{{route('adminEditCourses.edit',$course->id)}}"><button>Edit</button></a>
                        <form action="{{route('adminDestroyCourses.destroy',$course->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <!--<a href="{{route('tracks.create')}}"><button>Add Track</button></a>--> --}}
        <a href="{{route('adminCreateCourses.create')}}" class="addbutton"><button>Add Course</button></a>

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
