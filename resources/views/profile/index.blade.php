@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>

                <a href="/post/create" id="add-new-post" class="btn btn-primary font-weight-bold">Add New Post</a>
            </div>

            <p class="pt-4 font-weight-bold">{{ $user->profile->title}}</p>

            <p>{{ $user->profile->description}}</p>
        </div>
    </div>

    <div class="row">
            @foreach ($user->posts as $post)
                <div class="col-md-4 mb-5">
                    <div class="card">
                        @if ($post->thumbnail)
                            <img class="card-img-top" src="/storage/{{ $post->thumbnail }}" alt="{{ $post->title }}">
                        @endif

                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>
@endsection
