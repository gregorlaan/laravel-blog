@extends('layouts.app')

@section('content')
<div class="container">

    <div class="jumbotron text-center">
        <h1 class="display-3">{{ $user->username }}</h1>

        <p class="lead">{{ $user->profile->title}}</p>
        <hr class="my-2">
        <p>{{ $user->profile->description}}</p>

        <p class="lead">
            <a href="/post/create" id="add-new-post" class="btn btn-primary font-weight-bold">Add New Post</a>
        </p>
    </div>

    <div class="row">
            @foreach ($user->posts as $post)
                <div class="col-md-4 mb-5">
                    <div class="card">
                        @if ($post->thumbnail)
                            <img class="card-img-top" src="/storage/{{ $post->thumbnail }}" alt="{{ $post->title }}">
                        @endif

                        <div class="card-body">
                            <a href="/post/{{$post->id}}" id="post-{{$post->id}}" class="text-decoration-none">
                                <h4 class="card-title">{{ $post->title }}</h4>
                            </a>

                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>
@endsection
