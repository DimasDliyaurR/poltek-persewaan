<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsramaPaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        "asrama_id",
        "is_dp",
        "dp_tarif",
    ];

    public function asrama(): BelongsTo
    {
        return $this->belongsTo(Asrama::class);
    }
}
