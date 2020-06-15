@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="form-group row">
                    <h1>Add New Post</h1>
                </div>
                
                <div class="form-group row">
                    <label for="title" class="col-form-label">{{ __('Title') }}</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="description" class="col-form-label">{{ __('Description') }}</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="thumbnail" class="col-form-label">{{ __('Thumbnail') }}</label>

                    <input id="thumbnail" type="file" class="form-control-file @error('thumbnail') is-invalid @enderror" name="thumbnail">

                    @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <quill-component id="content" name="content" label="Content" content="{{ old('content') }}"></quill-component>

                <div class="form-group row">
                    <button type="submit" class="btn btn-primary font-weight-bold">Publish</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
