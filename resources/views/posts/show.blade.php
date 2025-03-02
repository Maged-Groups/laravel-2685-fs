@extends('layouts.main')

@section('page-title', $post->title)

@section('main-content')

    <div class="p-4">

        <h1 class="p-4 text-center border">{{ $post->title }}</h1>



        <div class="bg-gray-900 text-white flex justify-end gap-4 p-4">
            <a href='{{ route('posts.edit', $post) }}'>Edit</a>
            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>



        <h2>{{ $post->post_status->type }}</h2>

        <p>
            {{ $post->body }}
        </p>

        @foreach ($post->comments as $comment)
            @include('components.comments.comment-card')
        @endforeach
    </div>

@endsection
