<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

        public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

        public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

        public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
