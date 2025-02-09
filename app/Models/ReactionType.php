<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReactionType extends Model
{
    /** @use HasFactory<\Database\Factories\ReactionTypeFactory> */
    use HasFactory;

    // Relationships
    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

}
