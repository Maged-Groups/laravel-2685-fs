@extends('layouts.main')


@section('page-title', 'All posts')


@section('main-content')
<div class="flex gap-4 items-center">
    <h2 class="text-3xl p-3 my-4 uppercase font-semibold">ALL Posts</h2>
    <a href="{{ route('posts.create') }}" class="px-3 py-1 rounded-md shadow-md bg-green-600 text-white">Add Post +</a>
</div>

<div class="grid gap-3 p-6">

    @foreach ($ready_posts as $post )
    <div class="p-2 border-2">
        <h2>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
        </h2>
    </div>
    @endforeach
</div>


@endsection
