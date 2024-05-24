<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RatingMerkKendaraan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function merkKendaraan(): BelongsTo
    {
        return $this->belongsTo(MerkKendaraan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function like(): HasMany
    {
        return $this->hasMany(LikeMerkKendaraan::class);
    }
}
