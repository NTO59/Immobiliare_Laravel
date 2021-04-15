<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('title')
            Immobiliare
        @show
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Immobiliare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('a-propos') ? 'active' : '' }}" href="/a-propos">A propos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
