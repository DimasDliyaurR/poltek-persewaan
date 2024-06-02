<?php

namespace App\Models;

use App\Models\TipeAsrama;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailFotoTipeAsrama extends Model
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

    public function detailFotoTipeAsrama(): BelongsTo
    {
        return $this->belongsTo(TipeAsrama::class);
    }
}
