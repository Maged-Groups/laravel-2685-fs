@extends('layouts.main')


@section('page-title', 'All posts')


@section('main-content')
    <div class="flex gap-4 items-center">
        <h2 class="text-3xl p-3 my-4 uppercase font-semibold">ALL Posts</h2>
        <a href="{{ route('posts.create') }}" class="px-3 py-1 rounded-md shadow-md bg-green-600 text-white">Add Post +</a>
    </div>

    <div class="grid gap-3 p-6">

        @foreach ($ready_posts as $post)
            <div class="p-2 border-2">
                <div class="flex justify-between p-4 ">

                    <h2>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </h2>

                    <h2 class="{{ color($post->post_status->type) }}">{{ $post->post_status->type }}</h2>
                </div>



                <div class="flex justify-between">
                    <h3>Comments {{ $post->comments_count }}</h3>
                    <h3>Reactions {{ $post->reactions_count }}</h3>
                </div>

                By <a href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a>

            </div>
        @endforeach
    </div>


@endsection
