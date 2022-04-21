@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <form action="">
            <div class="input-group mb-3">
                <input value="{{ $search ?? old('search') }}" type="text" name="search" class="form-control"
                    placeholder="Іздеу" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Іздеу</button>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-between mb-3" style="height: 35px">
            <div class="input-group" style="width: auto">

            </div>
            <form action="{{ route('createwatch') }}">
                <button class="btn btn-primary">Жаңа тауар қосу</button>
            </form>
        </div>
        <div style="width: 100%; overflow: auto">
            <table class="text-light table rounded">
                <thead>
                    <tr>
                        <th scope="col">Cурет</th>
                        <th scope="col">Аты</th>
                        <th scope="col">Бағасы</th>
                        <th scope="col" style="text-align: end">Командалар</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($watches as $watch)
                        <tr>
                            <td scope="row" style="width: 150px">
                                <div class="list-img rounded">
                                    <img class="list-img rounded" src="{{ $watch->image }}" alt="No Image">
                                </div>
                            </td>
                            <td scope="row" class="w-100 text-ellipsis">{{ $watch->name }}
                            </td>
                            <td scope="row" style="width: 250px">{{ $watch->price }}</td>
                            <td scope="row" style="width: max-content">
                                <div class="d-flex">
                                    <form action="{{ route('deletewatch', $watch) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Жою</button>
                                    </form>
                                    <form action="{{ route('createwatch') }}" method="get">
                                        <input type="hidden" name='id' value="{{ $watch->id }}">
                                        <button type="submit" class="btn btn-warning ms-2">Өзгерту</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $watches->links() }}
            </div>
        </div>
    </div>
@endsection
