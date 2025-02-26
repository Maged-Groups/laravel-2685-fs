<div class="border p-4 bg-gray-800 text-gray-100">
    <p>{{ $comment->comment }}</p>
    <div class="">By
        {{ $comment->user?->name }}
    </div>
</div>
