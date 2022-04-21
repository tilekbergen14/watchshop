@extends('layouts.app')

@section('content')
    <div class="header">
        <img class="header-img" src="/images/static/movie.jpg" alt="">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">WatchShop</a>
                @auth
                    <form class="d-flex" action="{{ route('dashboard') }}" method="get">
                        <button style="z-index: 3" class="btn btn-primary" type="submit">{{ auth()->user()->name }}</button>
                    </form>
                @endauth
                @guest
                    <form class="d-flex" action="{{ route('login') }}" method="get">
                        <button style="z-index: 3" class="btn btn-primary" type="submit">КІРУ</button>
                    </form>
                @endguest

            </div>
        </nav>
        <div class='welcome'>
            <div class="welcome-text">
                <h1>Әлемдегі ең керемет сағаттар!</h1>
                <p>Қазақстандағы және әлемдегі ең керемет сағаттар, егер сағат керек болса бізге кел!</p>
            </div>
        </div>
    </div>
    <div class="text-light hero py-4 px-2">
        <div class="left-side container">
            <div class="d-flex justify-content-between align-items-center">
                <p class="title">СОҢҒЫ ТАУАРЛАР</p>
                <a href="{{ route('home') }}">
                    {{-- <p class="title">БАРЛЫҒЫН КӨРУ
                        <i class="fa-solid fa-angles-right"></i>
                    </p> --}}
                </a>
            </div>
            <form action="{{ route('home') }}">
                <div class="input-group mb-3">
                    <input value="{{ $search ?? old('search') }}" type="text" name="search" class="form-control"
                        placeholder="Іздеу" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Іздеу</button>
                    </div>
                </div>
            </form>
            <div class="row m-0">
                @foreach ($watches as $watch)
                    <a href="{{ route('watch', $watch) }}" class="col-12 col-sm-6 col-lg-3 p-1 cu-card">
                        <div class="card" style="width: 100%">
                            <img src="{{ $watch->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $watch->name }}</h5>
                                <p class="card-text">{{ $watch->price }} &#8376;</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $watches->links() }}
            </div>
        </div>
    </div>

    <div class="footer border-top">
        <div class="container">
            <footer class="py-4">
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a href="#" class="nav-link text-light px-2">Басты бет</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light px-2">Сағаттар</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light px-2">Байланыс</a></li>
                </ul>
                <p class="text-light m-0 text-center">© 2022 WatchShop</p>
            </footer>
        </div>
    </div>
@endsection
