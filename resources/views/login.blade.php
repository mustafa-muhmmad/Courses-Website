<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign In</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/login.css')}}">

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">


    <div class="wrapper">
        <div class="header">
            <a href="{{ route('home-page') }}">
                <i class="fa-solid fa-book-open" style="color: #5ad8b2;"></i>
            </a>
        </div>
        <div class="input">
            <button>
                <a href="/admin">Admin</a>
            </button>
            <button>
                <a href="/instructor">Instructor</a>
            </button>
            <button>
                <a href="/student">Student</a>
            </button>
        </div>
    </div>


    </body>
</html>

