@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <h4 class="text-light font-weight-bold text-center">Create new episode!</h4>
        <form method="post" enctype="multipart/form-data" action="{{ route('createepisode') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $episode->id ?? null }}">
            @error('show_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Show</label>
                <select name='show_id' class="form-select" id="inputGroupSelect01">
                    @foreach ($shows as $show)
                        <option {{ $episode && $show->id === $episode->show_id ? 'selected' : '' }}
                            value={{ $show->id }}>
                            {{ $show->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('episode')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Episode</span>
                <input value="{{ $episode ? $episode->episode : old('episode') }}" name='episode' type="text"
                    class="form-control" placeholder="Episode" aria-label="episode" aria-describedby="addon-wrapping">
            </div>
            @if ($episode && $episode->video)
                <input type="hidden" value="{{ $episode->video }}" name="existedvideo">
                <iframe src="{{ $episode->video }}" class="uploaded-img bg-transparent mb-4" alt="{{ $episode->id }}">
                </iframe>
            @endif
            @error('video')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3 flex-nowrap">
                <input type="file" class="form-control" id="file" name="video"
                    value="{{ $episode ? $episode->video : old('video') }}" />
                <label style="width: 120px" class="input-group-text"
                    for="inputGroupFile02">{{ $episode && $episode->video ? 'New video' : 'Video' }}</label>
            </div>
            <button type="submit" class="btn btn-info w-100">{{ $episode ? 'Edit' : 'Add new' }}</button>
        </form>
    </div>
@endsection
