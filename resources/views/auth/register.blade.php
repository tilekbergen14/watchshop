@extends("layouts.app")

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container bg-light p-2 rounded" style="max-width: 500px">
            <form action="{{ route('register') }}" method='POST' class="text-center">
                @csrf
                <div class="mb-2">
                    <a class="navbar-brand" href="/">WatchShop</a>
                </div>
                @error('name')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="text" class="mb-2 form-control @error('name') border border-danger @enderror "
                        placeholder="Толық аты" name="name" value={{ old('name') }}>
                    <label for="floatingInput">Толық аты</label>
                </div>
                @error('username')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="text" class="mb-2 form-control @error('username') border border-danger @enderror"
                        placeholder="Пайдаланушы аты" name="username" value={{ old('username') }}>
                    <label for="floatingInput">Пайдаланушы аты</label>
                </div>
                @error('email')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="email" class="mb-2 form-control @error('email') border border-danger @enderror"
                        placeholder="Почта" name="email" value={{ old('email') }}>
                    <label for="floatingInput">Почта</label>
                </div>
                @error('password')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="password" class="mb-2 form-control @error('password') border border-danger @enderror"
                        placeholder="Құпиясөз" name="password" value={{ old('password') }}>
                    <label for="floatingInput">Құпиясөз</label>
                </div>
                @error('password')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="password" class="mb-2 form-control @error('password') border border-danger @enderror"
                        placeholder="Құпиясөзді қайталау" name="password_confirmation"
                        value={{ old('password_confirmation') }}>
                    <label for="floatingInput">Құпиясөзді қайталау</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input name='remember' type="checkbox" value="remember-me"> Есте сақтау
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Тіркелу</button>
                <div class="my-2">Аккаунт барма? <a class="text-primary" href="{{ route('login') }}">Кіру</a>
                </div>

            </form>
        </div>
    </div>
@endsection
