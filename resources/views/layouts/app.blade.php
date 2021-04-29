<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zadanie 7 | Erik Masny</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Domov</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('location') }}">Lokácia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stats') }}">Štatistiky</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div>
            @yield('content')
        </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
