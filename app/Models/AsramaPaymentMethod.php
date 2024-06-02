<?php

namespace App\Models;

use App\Models\TipeAsrama;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AsramaPaymentMethod extends Model
{
    use HasFactory;

    protected $primaryKey = "tipe_asrama_id";
    protected $table = "asrama_payment_methods";

    protected $fillable = [
        "tipe_asrama_id",
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

    public function asrama(): BelongsTo
    {
        return $this->belongsTo(TipeAsrama::class);
    }
}
