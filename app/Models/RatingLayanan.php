<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatingLayanan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    public function like(): HasMany
    {
        return $this->hasMany(LikeLayanan::class, "rating_layanan_id", "id");
    }
}
