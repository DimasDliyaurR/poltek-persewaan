<?php

namespace App\Models;

use App\Models\GedungLap;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailFotoGedungLap extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

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
