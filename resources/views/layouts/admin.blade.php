<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <title>Админ!</title>
</head>

<body class='text-light'>
    <div style=" height: 78px">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand flex-1" href="/">WatchShop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin') }}">Сағаттар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="{{ route('users') }}">Пайдаланушылар</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
    <script src="{{ asset('js/multi-select.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
