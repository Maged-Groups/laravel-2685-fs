@extends('layouts.main')



@section('page-title', 'Home Page')


@section('main-content')

    <div>

        <x-buttons.action text='Save' style='text-white bg-green-700' />

        <x-buttons.action text='Update' style='text-white bg-sky-700' />

        <x-buttons.action text='Cancel' style='text-white bg-red-700' />

        <x-buttons.action text='{{ $app_name }}' style='text-white bg-yellow-700' />

        <x-buttons.action text='$app_name' style='text-white bg-blue-700' />

        <x-buttons.action :text='$app_name' style='text-white bg-blue-700' />

        <x-buttons.action />

        <x-alert-component text='This is a text' />

        <x-alert-component />


        @foreach ($prices as $price)
            <x-price-label :$price />
        @endforeach


        <x-card title='Maged Yaseen'>

            <h3>Card Content</h3>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo necessitatibus aut placeat qui nemo
                perspiciatis, error non ratione expedita voluptate quibusdam ex architecto possimus sit corporis
                consequuntur maxime aspernatur quasi!</p>


            <x-slot:footer>
                <x-buttons.action text="Save" style="bg-green-600" />
                <x-buttons.action text="Cancel" style="bg-red-600" />
            </x-slot:footer>

        </x-card>

    </div>

@endsection
