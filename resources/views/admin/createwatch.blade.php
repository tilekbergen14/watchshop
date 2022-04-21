@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <h4 class="text-light font-weight-bold text-center">Жаңа сағат қосу!</h4>
        <form method="post" enctype="multipart/form-data" action="{{ route('createwatch') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $watch->id ?? null }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Аты</span>
                <input value="{{ $watch ? $watch->name : old('name') }}" name='name' type="text" class="form-control"
                    placeholder="Аты">
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Бағасы</span>
                <input value="{{ $watch ? $watch->price : old('price') }}" name='price' type="text" class="form-control"
                    placeholder="Бағасы">
            </div>
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Сипаттама</span>
                <textarea name='description' class="form-control" id="exampleFormControlTextarea1"
                    rows="10">{{ $watch ? $watch->description : old('description') }}</textarea>
            </div>
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Жасалған жылы</span>
                <input value="{{ $watch ? $watch->released_year : old('released_year') }}" name='released_year'
                    type="text" class="form-control" placeholder="Жасалған жылы" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Жасалған ел</span>
                <input value="{{ $watch ? $watch->country : old('country') }}" name='country' type="text"
                    class="form-control" placeholder="Жасалған ел">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Тип</label>
                <select name='type' class="form-select" id="inputGroupSelect01">
                    <option {{ $watch && $watch->type === 'Механикалық' ? 'selected' : '' }} value="Механикалық">
                        Механикалық</option>
                    <option {{ $watch && $watch->type === 'Смарт' ? 'selected' : '' }} value="Смарт">Смарт</option>
                </select>
            </div>
            @if ($watch && $watch->image)
                <input type="hidden" value="{{ $watch->image }}" name="existedImage">
                <img src="{{ $watch->image }}" class="uploaded-img mb-4" alt="{{ $watch->name }}">
            @endif
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3 flex-nowrap">
                <input type="file" class="form-control" id="file" name="image" />
                <label style="width: 120px" class="input-group-text"
                    for="inputGroupFile02">{{ $watch && $watch->image ? 'Жаңа сурет' : 'Сурет' }}</label>
            </div>

            <button type="submit" class="btn btn-info w-100">{{ $watch ? 'Edit' : 'Add new' }}</button>
        </form>
    </div>
@endsection
