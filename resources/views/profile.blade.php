@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <input name="" id="" class="btn btn-primary font-weight-bold" type="button" value="Add New Post">
                
            </div>

            <p class="pt-4 font-weight-bold">{{ $user->profile->title}}</p>

            <p>{{ $user->profile->description}}</p>
        </div>
    </div>
</div>
@endsection
