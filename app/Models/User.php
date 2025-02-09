<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;


    // Auto hash the password before save to the database
    protected function casts()
    {
        return [
            'password' => 'hashed'
        ];
    }


    // Relationships
    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
}


