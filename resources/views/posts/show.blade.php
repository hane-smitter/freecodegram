@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-8">
            <div>
                <div class="d-flex align-items-center">
                    <div class="mr-3" style="width: 35px;">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="avatar" class="w-100 rounded-circle" />
                    </div>
                    <div>
                        <span class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}" class="text-dark mr-3">
                                {{$post->user->username}}
                            </a>
                            	
                            &#8226;

                            <a href="#" class="ml-1">Follow</a>
                        </span>
                    </div>
                </div>
                <hr>
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
</div>
@endsection