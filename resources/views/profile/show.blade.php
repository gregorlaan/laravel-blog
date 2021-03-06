@extends('layouts.app')

@section('content')
<div class="container">

    <div class="jumbotron text-center">
        
        @if ($user->profile->image)
            <img width="200" height="200" class="border rounded-circle img-thumbnail align-self-start" src="/storage/{{ $user->profile->image }}" alt="{{ $user->name }}">
        @else
            <div style="width: 250px; height: 250px; background: white;" class="border rounded-circle figure-img d-inline-block" alt="placeholder"></div>
        @endif

        <h1 class="display-3">{{ $user->username }}</h1>

        <p class="lead">{{ $user->profile->title }}</p>

        <ul class="list-group list-group-horizontal-md d-flex justify-content-center mb-4">
            <li class="list-group-item">
                <b>{{ $user->stats['followers_count'] }}</b>
                Followers
            </li>
            <li class="list-group-item">
                <b>{{ $user->stats['posts_count'] }}</b>
                Posts
            </li>
            <li class="list-group-item">
                <b>{{ $user->stats['following_count'] }}</b>
                Following
            </li>
        </ul>
        
        <hr class="my-2">
        <p>{{ $user->profile->description }}</p>

        @can('update', $user->profile)
            <p class="lead">
                <a href="/post/create" id="add-new-post" class="btn btn-primary font-weight-bold">Add New Post</a>
                <a href="/profile/edit" id="edit-profile" class="btn btn-outline-primary font-weight-bold px-4">Edit Profile</a>
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
                        <div class="d-flex">
                            <a href="/post/{{$post->slug}}" id="post-{{$post->id}}" class="text-decoration-none mr-auto">
                                <h4 class="card-title">{{ $post->title }}</h4>
                            </a>

                            @can('update', $post)
                                <a href="/post/{{$post->slug}}/edit" id="edit-post-{{$post->id}}" class="btn btn-sm btn-primary font-weight-bold mb-auto">Edit Post</a>
                            @endcan
                        </div>

                        <p class="card-text">{{ $post->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
