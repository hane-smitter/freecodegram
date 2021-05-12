@extends('layouts.app')

@section('content')
<div class="container">
    <p class="display-3 text-center">FreeCodeGram Social</p>
    @foreach ($posts as $post)
        
    <div class="row">
        <div class="col-4 offset-2">
            <a href="/profile/{{ $post->user->id }}">
                <img src="/storage/{{$post->image}}" class="w-100">
            </a>
        </div>
    </div>
    <div class="row pt-1 pb-3">
        <div class="col-4 offset-2">
            <div>
                
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}" class="text-dark">
                            {{$post->user->username}}
                        </a>
                    </span>
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection