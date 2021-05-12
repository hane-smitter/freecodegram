@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">{{ __('caption') }}</label>

                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption">

                    @error('caption')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>


                <label for="image" class="col-md-4 col-form-label">{{ __('choose image') }}</label>
                <input type="file" class="form-control-file" id="image" name="image">

                @error('image')
                <strong>{{ $message }}</strong>
                @enderror
                <button class="btn btn-primary mt-4 d-block" type="submit">post</button>

            </div>
        </div>
    </form>
</div>
@endsection