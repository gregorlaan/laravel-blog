@extends('layouts.app')

@section('content')
<div class="container">

        <form action="/profile/update" enctype="multipart/form-data" method="post">
            @method('PATCH')
            @csrf

            <div class="jumbotron text-center form-group">

                <div class="d-flex flex-column justify-content-center">
                    <label id="profile-image" for="image" style="position: relative;" class="m-0 p-0 mx-auto">
                        <div id="profile-image-overlay" style="width: 200px; height: 200px; opacity: 0; position: absolute; top: 0;" class="d-flex justify-content-center border rounded-circle bg-dark">
                            <p class="lead align-self-center text-light m-0">Change Image</p>
                        </div>

                        @if ($user->profile->image)
                            <img width="200" height="200" class="border rounded-circle img-thumbnail align-self-start" src="/storage/{{ $user->profile->image }}" alt="{{ $user->name }}">
                        @else
                            <div style="width: 200px; height: 200px; background: white;" class="border rounded-circle figure-img d-inline-block" alt="placeholder"></div>
                        @endif
                    </label>

                    <input type="file" class="form-control-file d-none" id="image" name="image">


                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>
            
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
                    <a type="button" class="btn btn-danger font-weight-bold px-4" href="/profile">Cancel</a>
                </p>
            </div>
            
        </form>

</div>
@endsection
