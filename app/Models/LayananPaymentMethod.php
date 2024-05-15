<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LayananPaymentMethod extends Model
{
    use HasFactory;

    protected $primaryKey = "layanan_id";

    protected $fillable = [
        "layanan_id",
        "is_dp",
        "tarif_dp",
    ];

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }
}
