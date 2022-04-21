@extends('layouts.withnav')
@section('content')
    <div class="text-light">
        <div class="show-hero">
            <div class="show-hero-info">
                <img class="rounded" style="width: 100%; aspect-ratio: 16 / 9; object-fill: cover"
                    src="{{ $watch->image }}" alt="profile">
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <h4 class="card-big-title font-weight-bold">{{ $watch->name }}</h4>
                </div>
                <p><span class="secondary-text">Толығырақ: </span><span
                        class="secondary-text">{{ $watch->description }}</span></p>
                <p><span class="secondary-text">Бағасы: </span><span class="secondary-text">{{ $watch->price }}</span></p>
                <p><span class="secondary-text">Тип: </span><span class="secondary-text">{{ $watch->type }}</span>
                </p>
                <p><span class="secondary-text">Жасалған ел: </span><span
                        class="secondary-text">{{ $watch->country }}</span></p>
                <h5 class="card-big-title font-weight-bold my-3">Өз пікіріңді қалдыр!</h5>
                <form action="{{ route('comment', $watch) }}" method="POST">
                    @csrf
                    <textarea value="{{ old('value') }}" style="width: 100%" name="body" id="" cols="30" rows="10"></textarea>
                    <button class="btn btn-primary w-100 my-2">
                        Жариялау
                    </button>
                </form>

                <hr>
                <div class="comment-body">
                    @foreach ($watch->comments as $comment)
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ $comment->user->profile }}" alt="{{ $comment->user->name[0] }}"
                                    class="comment-user-profile">
                                <div>
                                    <p class="title-blue m-0">{{ $comment->user->name }}</p>
                                    <p class="text-muted m-0">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            @auth
                                @if ($comment->user->id === auth()->user()->id)
                                    <form action="{{ route('comment', $comment) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger">Жою</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                        <p class="fst-italic fw-light m-0">{{ $comment->body }}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
