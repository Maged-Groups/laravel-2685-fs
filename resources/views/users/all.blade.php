@extends('layouts.main')


@section('page-title', 'Users Page')


@section('main-content')
<h2 class="text-3xl p-3 my-4">ALL USERS</h2>


@foreach ($users as $user )
 <h2>{{ $user->name }}</h2>
@endforeach


@endsection
