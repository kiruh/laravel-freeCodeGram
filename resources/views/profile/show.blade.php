@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="{{ $user->profile->getImage() }}" alt="" class="rounded-circle w-50">
        </div>
        <div class="col-md-8 pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $user->username }}</h1>
                <div>
                    @can('update', $user->profile)
                        <a href="/p/create" class="btn btn-primary">Add post</a>
                        <a href="/profile/{{ $user->id }}/edit" class="btn btn-primary">Edit profile</a>
                    @else
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcan
                </div>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postsCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div>
                {{ $user->profile->description }}
            </div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach ($user->posts as $post)
            <div class="col-md-4 mb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
