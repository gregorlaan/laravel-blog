@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $user->username }}</h1>

            <p class="pt-4 font-weight-bold">{{ $user->profile->title}}</p>

            <p>{{ $user->profile->description}}</p>
        </div>
    </div>
</div>
@endsection
