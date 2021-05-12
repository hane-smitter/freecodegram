@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pb-3">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" width="100" class="rounded-circle" alt="{{ $user->name }}">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline pb-3">
                <h1>{{ $user->username }}</h1>

                @can('viewFollowBtn', $user->profile)
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                @endcan

                @can('update', $user->profile) 
                <a href="/p/create">Add new post</a>
                @endcan
            </div>

            @can('update', $user->profile) 
            <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postsCount }} </strong>posts</div>
                <div class="pr-5"><strong>{{ $followersCount }} </strong>followers</div>
                <div class="pr-5"><strong>{{ $followingCount }} </strong>following</div>
            </div>
            
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>

    </div>
    <div class="pt-4 font-weight-bold">Posts</div>
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