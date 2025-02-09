<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostStatus extends Model
{
    /** @use HasFactory<\Database\Factories\PostStatusFactory> */
    use HasFactory;

    // Relationships
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
