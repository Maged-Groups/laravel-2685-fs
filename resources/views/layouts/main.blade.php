<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    @vite('resources/css/app.css')
</head>

<body class="h-screen flex flex-col">

    @include('components.sessions')

    <header class="h-24 flex justify-center items-center bg-gray-900 text-white text-xls">
        <h1>App Title........</h1>
    </header>


    <nav class="text-white bg-red-800 p-4 flex gap-3 justify-center">
        <a href="/">Home</a>
        <a href="users">Users</a>
        <a href="/posts">Posts</a>
        <a href="about">About</a>
        <a href="">Link</a>
        <a href="">Link</a>
    </nav>


    <main class="flex-1">
        @yield('main-content')
    </main>



    <footer class="bg-green-900 text-green-100 p-4 w-full">
        All rights reserved @2025 - the company
    </footer>
</body>

</html>
