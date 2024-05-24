<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeLayanan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function rating(): BelongsTo
    {
        return $this->belongsTo(RatingLayanan::class);
    }
}
