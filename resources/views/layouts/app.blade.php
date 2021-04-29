<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zadanie 7 | Erik Masny</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset( mix('/css/app.css') ) }}">
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
        <div class="modal" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Súhlas so zisťovaním polohy</h5>
                  {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> --}}
                </div>
                <div class="modal-body">
                  <p>Pre používanie stránky je potrebný súhlas so zisťovaním polohy</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal" >Súhlasím</button>
                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                </div>
              </div>
            </div>
          </div>
    <script src="{{ asset( mix('/js/app.js') ) }}"></script>
    </body>
</html>
