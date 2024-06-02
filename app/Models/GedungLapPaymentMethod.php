<?php

namespace App\Models;

use App\Models\GedungLap;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GedungLapPaymentMethod extends Model
{
    use HasFactory;

    protected $primaryKey = "gedung_lap_id";

    protected $fillable = [
        "gedung_lap_id",
        "is_dp",
        "tarif_dp",
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn ($e) => "This model has been {$e}")
            ->logExcept([
                "created_at",
                "updated_at"
            ]);
    }

    public function gedungLap(): BelongsTo
    {
        return $this->belongsTo(GedungLap::class);
    }
}
