@extends('layouts.app')

@section('content')
<div class="container">

    <div class="jumbotron">
        <h1 class="display-4">{{ $post->title }}</h1>
        <hr class="my-4">
        <p class="lead">{{ $post->description }}</p>
    </div>

    <p>{{ $post->content }}</p>

</div>
@endsection
