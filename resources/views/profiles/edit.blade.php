@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title">

                    @error('title')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description">

                    @error('description')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">{{ __('Url') }}</label>

                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" required autocomplete="url">

                    @error('url')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>


                <label for="image" class="col-md-4 col-form-label">{{ __('choose image') }}</label>
                <input type="file" class="form-control-file" id="image" name="image">

                @error('image')
                <strong>{{ $message }}</strong>
                @enderror
                <button class="btn btn-primary mt-4 d-block" type="submit">Save profile</button>

            </div>
        </div>
    </form>
</div>
@endsection