@extends('layouts.main')


@section('page-title', $post->title)

@section('main-content')

    @include('components.posts.form')

@endsection
