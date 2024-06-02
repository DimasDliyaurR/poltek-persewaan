<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatingAlatBarang extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function alatBarang(): BelongsTo
    {
        return $this->belongsTo(AlatBarang::class);
    }

    public function like(): HasMany
    {
        return $this->hasMany(LikeAlatBarang::class, "rating_alat_barang_id", "id");
    }
}
