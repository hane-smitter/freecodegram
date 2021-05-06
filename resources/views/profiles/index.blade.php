@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{ $user->profile->image }}" width="100" class="rounded-circle" alt="{{ $user->name }}">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>

                @can('update', $user->profile) 
                <a href="/p/create">Add new post</a>
                @endcan
            </div>

            @can('update', $user->profile) 
            <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }} </strong>posts</div>
                <div class="pr-5"><strong>66.3k </strong>followers</div>
                <div class="pr-5"><strong>297 </strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold">FreeCodeCamp.org</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>

    </div>
    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-lg-3 col-md-4 col-sm-12">
            <a href="/p/{{ $post->id }}">
                <img class="w-100 shadow-1-strong rounded mb-4" src="/storage/{{ $post->image }}" alt="">
            </a>
        </div>
        @endforeach

    </div>
</div>
</div>
@endsection