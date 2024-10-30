<!DOCTYPE html>
<html>
<head>
    <title>Sign in</title>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/14a1e21579.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
</head>
<body>

    <div class="wrapper">
        <div class="header">
            <a href="{{ route('home-page') }}">
                <i class="fa-solid fa-book-open" style="color: #5ad8b2;"></i>
            </a>
        </div>
        <div class="input">
            <form action="{{ route('students.login') }}" method="post">
                @csrf
                <div class="e">
                    <input type="email" placeholder="E-mail" name="email" required >
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="p">
                    <input type="password" placeholder="Password" name="password" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                @if ($errors->any())
                    <div class="error-messages">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="f">
                    <a href="{{ route('studentEditPassword-page') }}">Forgot Password?</a>
                </div>
                <div class="s">
                    <input type="submit" name="signin" value="Sign in">
                </div>
                <div class="d">
                    Don't have an account? <a href="{{ route('studentregister-page') }}">Sign up</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
