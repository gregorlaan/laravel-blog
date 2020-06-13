@extends('layouts.app')

@section('content')
<div class="container">

    <div class="jumbotron text-center">

        <ul class="list-group list-group-horizontal-md d-flex justify-content-center mb-4">
            <li class="list-group-item">
                <b>{{ $user->profile->followers->count() }}</b>
                Followers
            </li>
            <li class="list-group-item">
                <b>{{ $user->posts->count() }}</b>
                Posts
            </li>
            <li class="list-group-item">
                <b>{{ $user->following->count() }}</b>
                Following
            </li>
        </ul>
        
        @if ($user->profile->image)
            <img width="200" height="200" class="border rounded-circle img-thumbnail align-self-start" src="/storage/{{ $user->profile->image }}" alt="{{ $user->name }}">
        @else
            <div style="width: 250px; height: 250px; background: white;" class="border rounded-circle figure-img d-inline-block" alt="placeholder"></div>
        @endif

        <h1 class="display-3">{{ $user->username }}</h1>

        <p class="lead">{{ $user->profile->title }}</p>
        <hr class="my-2">
        <p>{{ $user->profile->description }}</p>

        @can('update', $user->profile)
            <p class="lead">
                <a href="/post/create" id="add-new-post" class="btn btn-primary font-weight-bold">Add New Post</a>
                <a href="/profile/edit" id="add-new-post" class="btn btn-outline-primary font-weight-bold px-4">Edit Profile</a>
            </p>
        @elsecannot('update', $user->profile)
            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}">
                @if ($follows)
                    <button type="button" style="cursor: not-allowed" class="btn btn-outline-secondary font-weight-bold"><span>Unfollow</span></button>
                @else
                    <button type="button" style="cursor: not-allowed" class="btn btn-secondary font-weight-bold"><span>Follow</span></button>
                @endif
            </follow-button>
        @endcan

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
