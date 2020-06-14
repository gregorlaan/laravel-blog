@extends('layouts.app')

@section('content')
<div class="container">

    <div class="shadow-sm p-3 mb-4 bg-white rounded-lg">
        <div class="media">
            @if ($post->thumbnail)
                <img width="200" height="200" class="img-thumbnail align-self-start mr-3" src="/storage/{{ $post->thumbnail }}" alt="{{ $post->title }}">
            @endif

            <div class="media-body">
                <h1>{{ $post->title }}</h1>
                <h3>{{ $post->slug }}</h1>
                <hr class="my-3">
                <p class="lead text-secondary">{{ $post->description }}</p>

                <div class="media">

                    @if ($post->user->profile->image)
                        <img width="50" height="50" class="border rounded-circle align-self-start" src="/storage/{{ $post->user->profile->image }}" alt="{{ $post->user->name }}">
                    @else
                        <div style="width: 50px; height: 50px; background: white;" class="border rounded-circle figure-img d-inline-block" alt="placeholder"></div>
                    @endif

                    <div class="media-body ml-2">
                        <a href="/profile/{{$post->user->id}}" class="text-decoration-none">
                            <h6 class="mt-0 font-weight-bold">{{ $post->user->name }}</h6>
                        </a>

                        <p>{{ $post->created_at }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <p class="lead">{{ $post->content }}</p>

</div>
@endsection
