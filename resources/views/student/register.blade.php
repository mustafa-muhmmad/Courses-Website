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
            <!-- @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

            <form action="{{ route('studentRegister.register') }}" method="POST">
                @csrf
                <div class="p">
                    <input type="text" placeholder="User name" name="name" required >
                    <i class="fa-solid fa-user"></i>
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="e">
                    <input type="email" name="email" placeholder="Email" required >
                    <i class="fa-solid fa-envelope"></i>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="p">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fa-solid fa-lock"></i>
                    @foreach ($errors->get('password') as $error)
                        <div class="error-message">{{ $error }}</div>
                    @endforeach
                </div>
                <div class="e">
                    <input type="text" name="address" placeholder="Address" required>
                    <i class="fa-solid fa-map-marker-alt"></i>
                </div>
                <div class="radio-group">
                    <div>
                        <input type="radio" name="gender" id="genm" value="male">
                        <label for="genm">Male</label>
                    </div>
                    <div>
                        <input type="radio" name="gender" id="genf" value="female">
                        <label for="genf">Female</label>
                    </div>
                </div>
                <div class="e">
                    <input type="text" name="phonenumber" placeholder="Phone Number" >
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="s">
                    <input type="submit" value="Sign up">
                </div>
                <div class="d">
                    Already have an account? <a href="{{ route('student-pages') }}">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
