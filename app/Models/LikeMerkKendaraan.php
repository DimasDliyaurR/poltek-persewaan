<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikeMerkKendaraan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function rating(): BelongsTo
    {
        return $this->belongsTo(RatingMerkKendaraan::class, "rating_merk_kendaraan_id", "id");
    }
}
