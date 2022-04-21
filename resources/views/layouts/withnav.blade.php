<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <title>Жеке деректер</title>
</head>

<body>
    <div style=" height: 78px">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand flex-1" href="{{ route('home') }}">WatchShop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="">Explore</a>
                        </li> --}}
                        {{-- @auth
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./createmovie.php">Your favs</a>
                        </li>
                        @endauth --}}
                        @auth
                            <form class="d-flex" action="{{ route('dashboard') }}" method="get">
                                <button style="z-index: 3" class="btn btn-primary"
                                    type="submit">{{ auth()->user()->name }}</button>
                            </form>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
    <script src="{{ asset('./js/app.js') }}"></script>
</body>

</html>
