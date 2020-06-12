@extends('layouts.app')

@section('content')
<div class="container">

        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
            @method('PATCH')
            @csrf

            <div class="jumbotron text-center form-group">
            
                <h1 class="display-3">{{ $user->username }}</h1>

                <input id="title" type="text" title="Title" style="font-size: 1.125rem" class="form-control text-center @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <hr class="my-2">

                <input id="description" type="text" title="Description" class="form-control text-center mb-3 @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>

                @error('Description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <p class="lead">
                    <button type="submit" class="btn btn-success font-weight-bold px-4">Publish</button>
                    <button type="" class="btn btn-danger font-weight-bold px-4">Cancel</button>
                </p>
            </div>
            
        </form>

</div>
@endsection
