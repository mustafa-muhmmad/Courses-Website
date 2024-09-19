<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <a href="{{ route('home-page') }}">
                <i class="fa-solid fa-book-open" style="color: #5ad8b2;"></i>
            </a>
        </div>
        <div class="input">
            @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="p">
                    <input type="text" placeholder="User name" name="username" required value="{{ old('username') }}">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="e">
                    <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="p">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="e">
                    <input type="number" name="age" placeholder="Age" value="{{ old('age') }}">
                    <i class="fa-solid fa-calendar"></i>
                </div>
                <div class="s">
                    <input type="submit" value="Sign up">
                </div>
                <div class="d">
                    Already have an account? <a href="{{ route('login-page') }}">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
