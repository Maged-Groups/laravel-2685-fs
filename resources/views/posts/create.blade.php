@extends('layouts.main')


@section('page-title', 'Create a new post')

@section('main-content')

    <div class="p-4 max-w-lg">
        <h2>Add a post</h2>

        <form class="max-w-sm mx-auto" method="post" enctype="multipart/form-data" action="{{ route('posts.store') }}">
            {{-- <input name="_token" type="hidden" value="{{ csrf_token() }}"> --}}
            @csrf

            {{-- Title --}}
            <div class='mb-5'>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input id="title" type="text" name="title"
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ @old('title') }}" />

                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>


            {{-- Body --}}
            <div class='mb-5'>
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <textarea id="body" rows="4" name="body"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment...">{{ @old('body') }}</textarea>

                @error('body')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

            </div>

            {{-- Post Status  --}}
            <div class='mb-5'>
                <label for="post_status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                    Status</label>
                <select id="post_status_id" name="post_status_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                    <option value="">--Post Status Type--</option>
                    @foreach ($post_statuses as $post_status)
                        <option @if (@old('post_status_id') == $post_status->id) selected @endif value="{{ $post_status->id }}">
                            {{ $post_status->type }}</option>
                    @endforeach
                </select>
                @error('post_status_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Thumbnail --}}
            <div class='mb-5'>
                <label for="thumbnail">Post thumbnail</label>
                <input type="file" accept=".png,.jpg" name="thumbnail" id="thumbnail">
            </div>


            <div class="my-4">
                <button class="px-3 py-1 rounded-md shadow-md bg-green-600 text-white">Add Posts</button>
            </div>


            <div class="text-red-500">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
            </div>
        </form>
    </div>
@endsection
