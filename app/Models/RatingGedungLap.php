<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatingGedungLap extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function gedungLap(): BelongsTo
    {
        return $this->belongsTo(GedungLap::class);
    }

    public function like(): HasMany
    {
        return $this->hasMany(LikeGedungLap::class, "rating_gedung_lap_id", "id");
    }
}
