@extends('layouts.main')

@section('page-title', $post->title)

@section('main-content')

    <h1 class="p-4 text-center border">{{ $post->title }}</h1>

    <h2>{{ $post->post_status->type }}</h2>

    @foreach ($post->comments as $comment)
        @include('components.comments.comment-card')
    @endforeach

@endsection
