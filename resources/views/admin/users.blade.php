@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <form action="{{ route('users') }}">
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
        </div>
        <div style="width: 100%; overflow: auto">
            <table class="text-light table rounded">
                <thead>
                    <tr>
                        <th scope="col">Аты</th>
                        <th scope="col">Статус</th>
                        <th scope="col" style="text-align: end">Командалар</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $user->name }}
                            </td>
                            <td style="color: {{ $user->isadmin ? 'red' : '' }}" scope="row">
                                {{ $user->isadmin ? 'Админ' : 'Қарапайым пайдаланушы' }}</td>
                            <td scope="row">
                                <div class="d-flex justify-content-end">
                                    <form action="{{ route('deleteUser', $user) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Жою</button>
                                    </form>
                                    <form action="{{ route('makeAdmin', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit" style="width: 200px"
                                            class="btn {{ $user->isadmin ? 'btn-warning' : 'btn-info' }} ms-2">{{ $user->isadmin ? 'Пайдаланушы ету' : 'Админ ету' }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
