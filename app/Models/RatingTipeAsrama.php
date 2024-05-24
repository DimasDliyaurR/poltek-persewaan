<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatingTipeAsrama extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function tipeAsrama(): BelongsTo
    {
        return $this->belongsTo(TipeAsrama::class);
    }
    public function like(): HasMany
    {
        return $this->hasMany(LikeTipeAsrama::class, "rating_asrama_id", "id");
    }
}