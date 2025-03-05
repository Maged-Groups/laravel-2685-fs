@props([
    'style' => 'bg-zinc-300 text-zinc-900',
    'text' => 'OK'
])

<button class="px-4 py-2 my-2 rounded-md shadow-md {{ $style }}">{{ $text }}</button>
