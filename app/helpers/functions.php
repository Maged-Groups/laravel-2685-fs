<?php

use App\Http\Resources\PostStatusResource;
use App\Models\PostStatus;
use Illuminate\Support\Str;

function color(string $status): string
{
    return match (Str::lower($status)) {
        'published' => 'bg-green-600',
        'pending' => 'bg-yellow-400',
        'postponed' => 'bg-pink-500',
        'private' => 'bg-gray-800',
        'cancelled' => 'bg-gray-500',
        'rejected' => 'bg-red-500',
        default => 'bg-sky-200'
    };
}


function get_post_statuses()
{
    $post_statuses = PostStatus::orderBy('type')->get();

    $post_statuses = PostStatusResource::collection($post_statuses);

    return $post_statuses;
}
