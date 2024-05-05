<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GedungLapPaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        "gedung_lap_id",
        "is_dp",
        "dp_tarif",
    ];

    public function gedungLap(): BelongsTo
    {
        return $this->belongsTo(GedungLap::class);
    }
}
